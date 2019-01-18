const path = require('path'),
  { default: ImageminPlugin } = require('imagemin-webpack-plugin'),
  imageminMozjpeg = require('imagemin-mozjpeg'),
  MiniCssExtractPlugin = require('mini-css-extract-plugin'),
  OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin'),
  TerserPlugin = require('terser-webpack-plugin'),
  WebpackAssetsManifest = require('webpack-assets-manifest');

module.exports = {
  context: __dirname, // eslint-disable-line no-undef
  performance: {
    maxAssetSize: 2000000, // < ~2mb
  },
  entry: {
    main: './src/main.js',
    editor: './src/editor.js',
    login: './src/login.js',
    images: './src/images.js',
  },
  output: {
    path: path.resolve(__dirname, 'dist'), // eslint-disable-line no-undef
    filename: '[name].[contenthash].js',
  },
  resolve: {
    extensions: ['.js', '.scss', '.css', '.json'],
  },
  mode: 'development',
  devtool: 'none',
  module: {
    rules: [
      {
        test: /\.js?$/,
        loader: 'babel-loader',
      },
      {
        test: /\.(woff|woff2|eot|ttf)$/,
        loader: 'file-loader?limit=100000',
        query: {
          name: '[name].[contenthash].[ext]',
        },
      },
      {
        test: /\.(png|svg|jpg|gif|ico)$/,
        loader: 'file-loader',
        query: {
          name: '[name].[contenthash].[ext]',
        },
      },
      {
        test: /\.s?css$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          {
            loader: 'postcss-loader',
            options: {
              indent: 'postcss',
              plugins: [require('autoprefixer')({ browsers: 'last 2 versions', grid: true })],
            },
          },
          {
            loader: 'sass-loader',
          },
        ],
      },
    ],
  },
  plugins: [
    new ImageminPlugin({
      optipng: { optimizationLevel: 2 },
      gifsicle: { optimizationLevel: 3 },
      pngquant: { quality: '65-90', speed: 4 },
      svgo: {
        plugins: [
          // eslint-disable prettier/prettier
          { removeUnknownsAndDefaults: true },
          { cleanupIDs: true },
          { removeViewBox: false },
        ], // eslint-enable prettier/prettier
      },
      plugins: [imageminMozjpeg({ quality: 70 })],
    }),
    new MiniCssExtractPlugin({
      filename: '[name].[contenthash].css',
    }),
    new WebpackAssetsManifest(),
  ],
  optimization: {
    minimizer: [
      new TerserPlugin({
        parallel: true,
        terserOptions: {
          ecma: 6,
        },
      }),
      new OptimizeCssAssetsPlugin(),
    ],
  },
};
