<?php

namespace App\Command;

use App\Event\ProductEvent;
use App\Event\ProductEventType;
use App\Services\ProductService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class WorkCommand extends Command
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;
    /**
     * @var ProductService
     */
    private $productService;

    public function __construct(EventDispatcherInterface $eventDispatcher, ProductService $productService)
    {
        parent::__construct();
        $this->eventDispatcher = $eventDispatcher;
        $this->productService  = $productService;
    }

    protected function configure()
    {
        $this->setName('product:make')
            ->setDescription('Make Product')
            ->setHelp('Make New Product');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        //$a = array('x', 's', 'g', 'a', 'b');
        $a = array(9, 5, 2, 1, 4, 3, 6, 7, 8, 8, 11, 12,99, 154, 0, -1, -9);
        $arr = [];
        foreach ($a as $time) {
            $obj = new \stdClass();
            $obj->time = $time;
            $arr[]     = $obj;
        }

        usort($arr, 'self::cmp');

        foreach ($arr as $item) {
            dump($item);
        }
        return 0;
    }

    protected static function cmp($a, $b)
    {
        if ($a->time < $b->time) {
            return 1;
        } elseif ($a->time > $b->time) {
            return -1;
        }
        return 0;
    }
}
