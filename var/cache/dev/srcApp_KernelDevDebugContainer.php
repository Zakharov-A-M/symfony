<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerJxlEZDx\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerJxlEZDx/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerJxlEZDx.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerJxlEZDx\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerJxlEZDx\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'JxlEZDx',
    'container.build_id' => '615d1fcd',
    'container.build_time' => 1563469433,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerJxlEZDx');
