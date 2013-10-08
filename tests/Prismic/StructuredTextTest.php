<?php

namespace Prismic\Test;

use Prismic\Document;

class StructuredTextTest extends \PHPUnit_Framework_TestCase
{

    protected $document;

    protected function setUp()
    {
        $search = json_decode(file_get_contents(__DIR__.'/../fixtures/search.json'));
        $this->document = Document::parse($search[0]);
        $this->structuredText = $this->document->getStructuredText('product.description');
    }


    public function testGetFirstParagraph() {
        $content = "If you ever met coconut taste on its bad day, you surely know that coconut, coming from bad-tempered islands, can be rough sometimes. That is why we like to soften it with a touch of caramel taste in its ganache. The result is the perfect encounter between the finest palm fruit and the most tasty of sugarcane's offspring.";
        $this->assertEquals($this->structuredText->getFirstParagraph()->text, $content);
    }

    public function testGetFirstImage() {
        $this->assertEquals($this->structuredText->getFirstImage()->view->url, 'https://prismicio.s3.amazonaws.com/lesbonneschoses/899162db70c73f11b227932b95ce862c63b9df22.jpg');
    }
}