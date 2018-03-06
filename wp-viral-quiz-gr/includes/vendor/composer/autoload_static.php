<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite22a6fbb96cdc54ac7d4b89f745f6269
{
    public static $files = array (
        '89ff252b349d4d088742a09c25f5dd74' => __DIR__ . '/..' . '/yahnis-elsts/plugin-update-checker/plugin-update-checker.php',
    );

    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static $classMap = array (
        'AC_Account' => __DIR__ . '/..' . '/activecampaign/api-php/includes/Account.class.php',
        'AC_Auth' => __DIR__ . '/..' . '/activecampaign/api-php/includes/Auth.class.php',
        'AC_Automation' => __DIR__ . '/..' . '/activecampaign/api-php/includes/Automation.class.php',
        'AC_Campaign' => __DIR__ . '/..' . '/activecampaign/api-php/includes/Campaign.class.php',
        'AC_Connector' => __DIR__ . '/..' . '/activecampaign/api-php/includes/Connector.class.php',
        'AC_Contact' => __DIR__ . '/..' . '/activecampaign/api-php/includes/Contact.class.php',
        'AC_Deal' => __DIR__ . '/..' . '/activecampaign/api-php/includes/Deal.class.php',
        'AC_Design' => __DIR__ . '/..' . '/activecampaign/api-php/includes/Design.class.php',
        'AC_Form' => __DIR__ . '/..' . '/activecampaign/api-php/includes/Form.class.php',
        'AC_Group' => __DIR__ . '/..' . '/activecampaign/api-php/includes/Group.class.php',
        'AC_List_' => __DIR__ . '/..' . '/activecampaign/api-php/includes/List.class.php',
        'AC_Message' => __DIR__ . '/..' . '/activecampaign/api-php/includes/Message.class.php',
        'AC_Settings' => __DIR__ . '/..' . '/activecampaign/api-php/includes/Settings.class.php',
        'AC_Subscriber' => __DIR__ . '/..' . '/activecampaign/api-php/includes/Subscriber.class.php',
        'AC_Tracking' => __DIR__ . '/..' . '/activecampaign/api-php/includes/Tracking.class.php',
        'AC_User' => __DIR__ . '/..' . '/activecampaign/api-php/includes/User.class.php',
        'AC_Webhook' => __DIR__ . '/..' . '/activecampaign/api-php/includes/Webhook.class.php',
        'AWeberAPI' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/aweber.php',
        'AWeberAPIBase' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/aweber.php',
        'AWeberAPIException' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/exceptions.php',
        'AWeberCollection' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/aweber_collection.php',
        'AWeberEntry' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/aweber_entry.php',
        'AWeberEntryDataArray' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/aweber_entry_data_array.php',
        'AWeberException' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/exceptions.php',
        'AWeberMethodNotImplemented' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/exceptions.php',
        'AWeberOAuthAdapter' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/oauth_adapter.php',
        'AWeberOAuthDataMissing' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/exceptions.php',
        'AWeberOAuthException' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/exceptions.php',
        'AWeberResourceNotImplemented' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/exceptions.php',
        'AWeberResponse' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/aweber_response.php',
        'AWeberResponseError' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/exceptions.php',
        'AWeberServiceProvider' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/aweber.php',
        'ActiveCampaign' => __DIR__ . '/..' . '/activecampaign/api-php/includes/ActiveCampaign.class.php',
        'CurlInterface' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/curl_object.php',
        'CurlObject' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/curl_object.php',
        'CurlResponse' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/curl_response.php',
        'OAuthApplication' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/oauth_application.php',
        'OAuthServiceProvider' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/oauth_application.php',
        'OAuthUser' => __DIR__ . '/..' . '/aweber/aweber/aweber_api/oauth_application.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite22a6fbb96cdc54ac7d4b89f745f6269::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite22a6fbb96cdc54ac7d4b89f745f6269::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite22a6fbb96cdc54ac7d4b89f745f6269::$classMap;

        }, null, ClassLoader::class);
    }
}
