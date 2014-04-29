<?php

$modLastModified = $modx->getService('modlastmodified','modLastModified',$modx->getOption('modlastmodified_core_path',null,$modx->getOption('core_path').'components/modlastmodified/').'model/modlastmodified/',$scriptProperties);
if (!($modLastModified instanceof modLastModified)) return '';

/**
 * Do your snippet code here. This demo grabs 5 items from our custom table.
 */
$tpl = $modx->getOption('tpl',$scriptProperties,'Item');
$sortBy = $modx->getOption('sortBy',$scriptProperties,'name');
$sortDir = $modx->getOption('sortDir',$scriptProperties,'ASC');
$limit = $modx->getOption('limit',$scriptProperties,5);
$outputSeparator = $modx->getOption('outputSeparator',$scriptProperties,"\n");

/* build query */
$c = $modx->newQuery('modLastModifiedItem');
$c->sortby($sortBy,$sortDir);
$c->limit($limit);
$items = $modx->getCollection('modLastModifiedItem',$c);

/* iterate through items */
$list = array();
/* @var modLastModifiedItem $item */
foreach ($items as $item) {
	$itemArray = $item->toArray();
	$list[] = $modLastModified->getChunk($tpl,$itemArray);
}

/* output */
$output = implode($outputSeparator,$list);
$toPlaceholder = $modx->getOption('toPlaceholder',$scriptProperties,false);
if (!empty($toPlaceholder)) {
	/* if using a placeholder, output nothing and set output to specified placeholder */
	$modx->setPlaceholder($toPlaceholder,$output);
	return '';
}
/* by default just return output */
return $output;