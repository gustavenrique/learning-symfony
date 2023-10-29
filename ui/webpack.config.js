const
    Encore = require('@symfony/webpack-encore'),
    path = require('path'),
    webpack = require('webpack');

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')

    .addEntry('app', './assets/ts/app.ts')
    .addEntry('welcome', './assets/ts/pages/Welcome/welcome.ts')

    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enableIntegrityHashes(Encore.isProduction())

    // .configureBabel((config) => {
    //     config.plugins.push('@babel/a-babel-plugin');
    // })
    .configureBabelPresetEnv(config => {
        config.useBuiltIns = 'usage';
        config.corejs = '3.23';
    })
    .enableSassLoader()
    .enableTypeScriptLoader()
    .enableVueLoader(() => { }, {
        runtimeCompilerBuild: false
    })

const config = Encore.getWebpackConfig();

config.plugins.push(
    new webpack.DefinePlugin({
        __VUE_PROD_DEVTOOLS__: false,
        __VUE_OPTIONS_API__: true
    })
)

module.exports = config;
