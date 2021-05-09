<?php
namespace tests;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;
use PHPUnit\Framework\TestCase;

class PaginaInicialTest extends TestCase
{
    private WebDriverBy $driver;
    /*
     * SetUp executa antes de inicar os testes
     */
    protected function setUp(): void
    {
        //Arrange
        //Host do Selenium
        $host = 'http://localhost:4444/wd/hub';
        //Executa no chrome
        $this->driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());

        //Act
        //Página que vai executar o teste
        $this->driver->navigate()->to('https://www.precodogas.com.br');
    }
/*
 * tearDown Executa ao final de cada teste
 */
    protected function tearDown(): void
    {
        $this->driver->close();
    }

    /* public function testOpenSitePrincipal()
     {
         //Arrange
         //Host do Selenium
         $host = 'http://localhost:4444/wd/hub';
         //Executa no chrome
         $driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());

         //Act
         //Página que vai executar o teste
         $driver->navigate()->to('https://www.precodogas.com.br');

         //Assert
         //Procura um palavra dentro do código fonte da página
         self::assertStringContainsString('Gás', $driver->getPageSource());

     }*/

    public function testOpenSitePrincipalAndSearchWordGas()
    {

        //Buscar pelo nome da tag
        $h1Locator = WebDriverBy::tagName('h4');
        $textoH1 = $this->driver->findElement($h1Locator)->getText();

        $textoAzulEscuro = $this->driver->findElement(WebDriverBy::className('azul-escuro'))->getText();
        $textoAzulEscuro2 = $this->driver->findElement(WebDriverBy::xpath('//a[@class="azul-escuro text-center antonhome2 mt-3"]'))->getText();
        //Assert
        //Procura um palavra dentro do código fonte da página
        self::assertSame('Pague o preço do site.', $textoH1);
       // self::assertSame('Exemplo da lista dos revendedores de gás de cozinha:', $textoAzulEscuro);
        self::assertSame('Tem dúvida para comprar Gás', $textoAzulEscuro2);

        //Fechar navegador


    }

}