<?php
namespace App\Command;

use App\ApiResponseDTO\Brand;
use App\Exceptions\ValidationException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use App\Services\BrandService;

class CreateBrandCommand extends Command
{
    //protected static $defaultName = 'app:create-brand';

    /** @var BrandService */
    private $brandService;

    /** @var DenormalizerInterface */
    private $denormalizer;

    /**
     * @param BrandService $brandService
     * @param DenormalizerInterface $denormalizer
     */
    public function __construct(
        BrandService $brandService,
        DenormalizerInterface $denormalizer
    ) {
        parent::__construct(null);
        $this->brandService = $brandService;
        $this->denormalizer = $denormalizer;
    }

    protected function configure(): void
    {
        $this
            ->setName('app:create-brand')
            ->setDescription('Creating new brand cars')
            ->addArgument('brand', InputArgument::REQUIRED, 'The brand the car.')
            ->addArgument('icon', InputArgument::REQUIRED, 'The icon for brand.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @throws ExceptionInterface
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        /** @var Brand $inputRequest */
        $inputRequest = $this->denormalizer->denormalize(
            [
                'brand' => $input->getArgument('brand'),
                'icon' => $input->getArgument('icon')
            ],
            Brand::class
        );

        $io = new SymfonyStyle($input, $output);
        $io->title('Brand Creator');

        $io->table(
            ['Brand', 'Icon'],
            [
                [$input->getArgument('brand'), $input->getArgument('icon')]
            ]
        );

        try {
            $this->brandService->createBrand($inputRequest);
        } catch (ValidationException $exception) {
            $io->error($exception->getErrors());
            return;
        }

        $io->success('Done!');
    }
}
