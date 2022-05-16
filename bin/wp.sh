#!/usr/bin/env bash

set -e

npx wp-env run cli \
    "${@:-help core}"
