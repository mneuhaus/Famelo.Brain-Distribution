<?php
use \TYPO3\Surf\Domain\Model\Workflow;
use \TYPO3\Surf\Domain\Model\Node;
use \TYPO3\Surf\Domain\Model\SimpleWorkflow;

$application = new \Famelo\Surf\SharedHosting\Application\Flow('brain.famelo.com');
$application->setDeploymentPath('/kunden/350350_33330/brain');
$application->setOption('repositoryUrl', 'git@github.com:mneuhaus/Famelo.Brain-Distribution.git');
$application->setOption('keepReleases', 1);

// Specify the hosting package
$application->setHosting('DomainFactory/ManagedHosting');

$node = new Node('brain.famelo.com');
$node->setHostname('famelo.com');
$node->setOption('username', 'ssh-350350-famelo');

$application->addNode($node);

// Set the default context
$application->setOption('defaultContext', 'Production');
$application->setContext('Production');

$workflow = new SimpleWorkflow();
// Enable to keep "broken" deployment for aftermath analysis
// $workflow->setEnableRollback(FALSE);

$workflow->afterTask('typo3.surf:composer:install', array(
	'famelo.surf.sharedhosting:downloadBeard',
	'famelo.surf.sharedhosting:beardPatch'
));


$deployment->setWorkflow($workflow);
$deployment->addApplication($application);
?>