const
    Encore = require('@symfony/webpack-encore'),
    path = require('path'),
    webpack = require('webpack'),
    { VuetifyPlugin } = require('webpack-plugin-vuetify');

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('main', './resources/assets/ts/main.ts')

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
    .enablePostCssLoader(config => {
        config.postcssOptions = { config: './postcss.config.ts' };
    })

    .addAliases({
        '@': path.resolve(__dirname, 'resources')
    })

    .addPlugin(new webpack.DefinePlugin({
        __VUE_PROD_DEVTOOLS__: false,
        __VUE_OPTIONS_API__: true
    }))
    .addPlugin(new VuetifyPlugin({ autoImport: true }));

const config = Encore.getWebpackConfig();

module.exports = config;