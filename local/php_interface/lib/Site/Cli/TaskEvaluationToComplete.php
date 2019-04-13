<?php

namespace Site\Cli;

use \Bitrix\Tasks\Manager\Task;
use Bitrix\Main\Loader;
use Bitrix\Main\Type\Date;
use Bitrix\Main\Type\DateTime;
use Bitrix\Main\IO\Directory;
use Site\Entity\TaskTable;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TaskEvaluationToComplete extends Command
{

    const OPTION_DATE = 'date';
    const OPTION_DATE_SHORTCUT = 'd';

    protected function configure()
    {
        $this
            ->setName('evaluation-to-complete')
            ->setDescription('"На оценке" -> "Завершена"')
            ->setHelp('Перевод задач из статуса "На оценке" в статус "Завершена" по истчении определенного времен')
            ->setDefinition(
                new InputDefinition(array(
                    new InputOption(self::OPTION_DATE, self::OPTION_DATE_SHORTCUT, InputOption::VALUE_REQUIRED, 'Строка Date->add для выборки задач по дате')
                ))


            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln([
            'Перевод задач из статуса "На оценке" в статус "Завершена"',
            '==============',
            '',
        ]);

        $output->writeln($input->getOption('date'));

        $dateAdd = trim($input->getOption(self::OPTION_DATE));
        $dateFrom = new DateTime();
        $dateFrom->add((empty($dateAdd)) ? '-3 days' : "-{$dateAdd}");

        $output->writeln("<comment>Tasks from {$dateFrom}</comment>");

        $res = TaskTable::query()
            ->setSelect(['*'])
            ->where('STATUS', \CTasks::STATE_EVALUATION)
            ->where('STATUS_CHANGED_DATE', '<', $dateFrom)
            ->exec()
            ->fetchCollection();
        foreach ($res as $r) {
            $taskId = $r->getId();
            $output->write("id[{$taskId}]   ");
            try {
                $out = Task::update($r->getResponsibleId(), $taskId, ['STATUS' => \CTasks::STATE_COMPLETED]);
                $hasFatalErrors = $out['ERRORS']->checkNoFatals();
                $output->writeln(($hasFatalErrors) ? "<info>Ok</info>" : "<error>ERROR</error>");
            } catch (\Exception $e) {
                $output->writeln("<error>CODE[{$e->getCode
                ()}] {$e->getMessage()}</error>");
            }
        }
        $output->writeln('<comment>END</comment>');
    }
}