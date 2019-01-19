# blanket
## blanket is a modern and opinionated Wordpress starter theme

### Basics

[blanket](https://github.com/gblakeman/blanket) is a [Wordpress](https://wordpress.org/) starting-point theme forked from @jonathanawesome’s [original](https://github.com/jonathanawesome/blanket). The theme provides modern javascript and styles tooling through Node and includes a setup for assets with cache-busting, hashed filenames. This setup comes with a [CircleCI](https://circleci.com) config for linting, a build-check, and deployment of a cleaned-up version of the theme to S3.

### Setup

Be sure to place the repo inside the theme directory of your Wordpress install.

Install everything with:

`yarn install`

The `bundle install` command will be run first. You can always run it separately as well.

### Deployment

This setup comes with a [CircleCI](https://circleci.com) config for linting, a build-check, and deployment of a cleaned-up version of the theme to S3.

Connect your repo to a [CircleCI](https://circleci.com) account.

Make sure the following environment variables are set:

* `AWS_ACCESS_KEY_ID`
* `AWS_SECRET_ACCESS_KEY`

The script syncing with AWS will upload a clean theme by ignoring hidden files, `/src`, npm/yarn files, and the repo README.

## Usage

In development, start the assets server with this command:

```
yarn start
```

## Linting

Code staged for commits will automatically be linted using [`eslint`](https://github.com/eslint/eslint) and [`stylelint`](https://stylelint.io).

To lint the entire css/js codebase

```
yarn lint
```

To lint a codebase sub-section:

```
yarn lint:css
yarn lint:js
```

## Build

Build cleans the `dist` directory and makes a fresh copy of all assets with hashed filenames using [webpack’s](https://github.com/webpack/webpack) `contenthash` and a manifest file. The `getHashedAssetWithPath` and `getHashedAsset` helpers in Wordpress use the manifest to display the correct filenames for a given asset.

```
yarn build
```

Clean up:

```
yarn clean
```
