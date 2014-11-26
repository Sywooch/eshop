<?php
/**
 * Sitemap class.
 * 
 * What are Sitemaps: http://www.sitemaps.org/
 */
class Sitemap implements Iterator
{
	protected $changefreq = 'always';
	
	protected $priority = 0.5;
	
	protected $items = [];
	
	public function __construct() {
		$this->items = Yii::app()->params['pages'];
		$this->saveXML();
		return $this;
	}
	
	public function current() {
		return current($this->items);
	}
	
	public function next() {
		return next($this->items);
	}

	public function key() {
		return key($this->items);
	}
	
	public function valid() {
		return (current($this->items) !== false);
	}
	
	public function rewind() {
		reset($this->items);
	}
	
	protected function saveXML() {
		$dom = new DOMDocument('1.0', 'UTF-8');
		$urlset = $dom->createElement('urlset');
		$urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
		while(list($page) = each($this->items)) {
			$url = $dom->createElement('url');
			$loc = $dom->createElement('loc');
			$loc->appendChild($dom->createTextNode(create_url($page)));
			$url->appendChild($loc);
			$lastmod = $dom->createElement('lastmod');
			$lastmod->appendChild($dom->createTextNode(date('Y-m-d')));
			$url->appendChild($lastmod);
			$changefreq = $dom->createElement('changefreq');
			$changefreq->appendChild($dom->createTextNode($this->changefreq));
			$url->appendChild($changefreq);
			$priority = $dom->createElement('priority');
			$priority->appendChild( $dom->createTextNode($this->priority));
			$url->appendChild($priority);
			$urlset->appendChild($url);
		}
		$dom->appendChild($urlset);
		file_put_contents('sitemap.xml', $dom->saveXML());
	}
	
}
