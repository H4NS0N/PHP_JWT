<?php return array(
    'root' => array(
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'reference' => NULL,
        'name' => '__root__',
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'reference' => NULL,
            'dev_requirement' => false,
        ),
        'firebase/php-jwt' => array(
            'pretty_version' => 'v6.10.1',
            'version' => '6.10.1.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../firebase/php-jwt',
            'aliases' => array(),
            'reference' => '500501c2ce893c824c801da135d02661199f60c5',
            'dev_requirement' => false,
        ),
        'twbs/bootstrap' => array(
            'pretty_version' => 'v5.3.3',
            'version' => '5.3.3.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../twbs/bootstrap',
            'aliases' => array(),
            'reference' => '6e1f75f420f68e1d52733b8e407fc7c3766c9dba',
            'dev_requirement' => false,
        ),
        'twitter/bootstrap' => array(
            'dev_requirement' => false,
            'replaced' => array(
                0 => 'v5.3.3',
            ),
        ),
    ),
);
