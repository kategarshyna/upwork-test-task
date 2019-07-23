var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('web/build/')
    .setPublicPath('/build')

    .enableVueLoader()

    .addEntry('app', './assets/js/app.js')

    .enableSingleRuntimeChunk()

    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())

;

module.exports = Encore.getWebpackConfig();
