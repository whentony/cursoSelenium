<?php
namespace tests;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebElement;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriver;
use PHPUnit\Framework\TestCase;

class PaginaInicialTest extends TestCase
{
    private static WebDriver $driver;
    /*
 * 1 Navegador a cada teste
 */
    public static function setUpBeforeClass(): void
    {
        //Arrange
        //Host do Selenium
        $host = 'http://localhost:4444/wd/hub';
        //Executa no chrome
        self::$driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());

        //Act
        //Página que vai executar o teste
        self::$driver->navigate()->to('https://www.precodogas.com.br');
    }
    /*
     * SetUp executa antes de inicar os testes
     */
    protected function setUp(): void
    {
        //Página que vai executar o teste
        self::$driver->navigate()->to('https://www.precodogas.com.br');
    }

/*
 * tearDown Executa ao final de cada teste
 */
    protected function tearDown(): void
    {
        self::$driver->close();
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
        $textoH1 = self::$driver->findElement($h1Locator)->getText();

        $textoAzulEscuro = self::$driver->findElement(WebDriverBy::className('azul-escuro'))->getText();
        $textoAzulEscuro2 = self::$driver->findElement(WebDriverBy::xpath('//a[@class="azul-escuro text-center antonhome2 mt-3"]'))->getText();
        //Assert
        //Procura um palavra dentro do código fonte da página
        self::assertSame('Pague o preço do site.', $textoH1);
       // self::assertSame('Exemplo da lista dos revendedores de gás de cozinha:', $textoAzulEscuro);
        self::assertSame('Tem dúvida para comprar Gás', $textoAzulEscuro2);

        //Fechar navegador


    }

}