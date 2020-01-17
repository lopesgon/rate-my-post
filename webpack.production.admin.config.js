var path = require('path');

var config = {
  optimization: {
    minimize: true
  },
  externals: {
    jquery: 'jQuery',
    rmp_options: 'rmp_options',
  },
  mode: 'production',
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }
      }
    ]
  },
};

var publicScripts = Object.assign({}, config, {
    entry: "./_dev/admin/js/rate-my-post-admin.js",
    output: {
       path: path.resolve(__dirname, './rate-my-post/admin/js'),
       filename: "rate-my-post-admin.js"
    },
});

module.exports = [
    publicScripts,
];
