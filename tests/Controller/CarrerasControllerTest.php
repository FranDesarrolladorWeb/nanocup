<?php

namespace App\Test\Controller;

use App\Entity\Carreras;
use App\Repository\CarrerasRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CarrerasControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private CarrerasRepository $repository;
    private string $path = '/carreras/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Carreras::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Carrera index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'carrera[fecha]' => 'Testing',
            'carrera[circuito]' => 'Testing',
            'carrera[ganador]' => 'Testing',
            'carrera[n_vueltas]' => 'Testing',
        ]);

        self::assertResponseRedirects('/carreras/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Carreras();
        $fixture->setFecha('My Title');
        $fixture->setCircuito('My Title');
        $fixture->setGanador('My Title');
        $fixture->setN_vueltas('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Carrera');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Carreras();
        $fixture->setFecha('My Title');
        $fixture->setCircuito('My Title');
        $fixture->setGanador('My Title');
        $fixture->setN_vueltas('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'carrera[fecha]' => 'Something New',
            'carrera[circuito]' => 'Something New',
            'carrera[ganador]' => 'Something New',
            'carrera[n_vueltas]' => 'Something New',
        ]);

        self::assertResponseRedirects('/carreras/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getFecha());
        self::assertSame('Something New', $fixture[0]->getCircuito());
        self::assertSame('Something New', $fixture[0]->getGanador());
        self::assertSame('Something New', $fixture[0]->getN_vueltas());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Carreras();
        $fixture->setFecha('My Title');
        $fixture->setCircuito('My Title');
        $fixture->setGanador('My Title');
        $fixture->setN_vueltas('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/carreras/');
    }
}
