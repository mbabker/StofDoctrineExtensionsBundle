<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Gedmo\Revisionable\RevisionableListener;

return static function (ContainerConfigurator $container): void {
    $container->services()
        ->set('stof_doctrine_extensions.listener.revisionable', RevisionableListener::class)
            ->call('setCacheItemPool', [service('stof_doctrine_extensions.metadata_cache')])
            ->call('setAnnotationReader', [service('.stof_doctrine_extensions.reader')->ignoreOnInvalid()])
            ->call('setActorProvider', [service('stof_doctrine_extensions.tool.actor_provider')])
    ;
};
