# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## Unreleased

For a full diff see [`2.0.0...main`][2.0.0...main].

## [`2.0.0`][2.0.0]

For a full diff see [`1.1.0...2.0.0`][1.1.0...2.0.0].

### Changed

* Required `league/factory-muffin` ([#49]), by [@localheinz]
* Added return type declarations ([#51]), by [@localheinz]
* Renamed vendor namespace `Localheinz` to `Ergebnis` after move to [@ergebnis] ([#53]), by [@localheinz]

  Run

  ```
  $ composer remove ergebnis/factory-muffin-definition
  ```

  and

  ```
  $ composer require ergebnis/factory-muffin-definition
  ```

  to update.

  Run

  ```
  $ find . -type f -exec sed -i '.bak' 's/Ergebnis\\FactoryMuffin\\Definition/Ergebnis\\FactoryMuffin\\Definition/g' {} \;
  ```

  to replace occurrences of `Localheinz\FactoryMuffin\Definition` with `Ergebnis\FactoryMuffin\Definition`.

  Run

  ```
  $ find -type f -name '*.bak' -delete
  ```

  to delete backup files created in the previous step.

## [`1.1.0`][1.1.0]

For a full diff see [`1.0.0...1.1.0`][1.0.0...1.1.0].

## [`1.0.0`][1.0.0]

For a full diff see [`5d218c3...1.0.0`][5d218c3...1.0.0].

### Added

* Added `Definitions` ([#1]), by [@localheinz]

[1.0.0]: https://github.com/ergebnis/factory-muffin-definition/tag/1.0.0
[1.1.0]: https://github.com/ergebnis/factory-muffin-definition/tag/1.1.0
[2.0.0]: https://github.com/ergebnis/factory-muffin-definition/tag/2.0.0

[5d218c3...1.0.0]: https://github.com/ergebnis/factory-muffin-definition/compare/5d218c3...1.0.0
[1.0.0...1.1.0]: https://github.com/ergebnis/factory-muffin-definition/compare/1.0.0...1.1.0
[1.1.0...2.0.0]: https://github.com/ergebnis/factory-muffin-definition/compare/1.1.0...2.0.0
[2.0.0...main]: https://github.com/ergebnis/factory-muffin-definition/compare/2.0.0...main

[#1]: https://github.com/ergebnis/factory-muffin-definition/pull/1
[#49]: https://github.com/ergebnis/factory-muffin-definition/pull/49
[#51]: https://github.com/ergebnis/factory-muffin-definition/pull/51
[#53]: https://github.com/ergebnis/factory-muffin-definition/pull/53

[@ergebnis]: https://github.com/ergebnis
[@localheinz]: https://github.com/localheinz
