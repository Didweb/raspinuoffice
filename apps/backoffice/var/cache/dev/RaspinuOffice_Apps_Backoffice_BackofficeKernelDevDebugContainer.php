<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerNIwFpt8\RaspinuOffice_Apps_Backoffice_BackofficeKernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerNIwFpt8/RaspinuOffice_Apps_Backoffice_BackofficeKernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerNIwFpt8.legacy');

    return;
}

if (!\class_exists(RaspinuOffice_Apps_Backoffice_BackofficeKernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerNIwFpt8\RaspinuOffice_Apps_Backoffice_BackofficeKernelDevDebugContainer::class, RaspinuOffice_Apps_Backoffice_BackofficeKernelDevDebugContainer::class, false);
}

return new \ContainerNIwFpt8\RaspinuOffice_Apps_Backoffice_BackofficeKernelDevDebugContainer([
    'container.build_hash' => 'NIwFpt8',
    'container.build_id' => 'b25e21c2',
    'container.build_time' => 1621928567,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerNIwFpt8');
