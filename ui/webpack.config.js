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
    .addEntry('main', './views/main.ts')

    .splitEntryChunks()
    .disableSingleRuntimeChunk()
    /*
     * FEATURE CONFIG
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()

    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enableIntegrityHashes(Encore.isProduction())

    .configureBabelPresetEnv(config => {
        config.useBuiltIns = 'usage';
        config.corejs = '3.23';
    })
    .enableSassLoader()

    .enableTypeScriptLoader()
    .enableVueLoader(() => { }, {
        runtimeCompilerBuild: false,
        version: 3
    })

    .addAliases({
        '@': path.resolve(__dirname, 'views')
    })

    .addPlugin(new webpack.DefinePlugin({
        __VUE_PROD_DEVTOOLS__: false,
        __VUE_OPTIONS_API__: true
    }));

module.exports = Encore.getWebpackConfig();