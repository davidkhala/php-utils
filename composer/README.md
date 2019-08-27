# Composer

## Package Types

Out of the box, Composer supports four types:

- **library**: [default]. It will simply copy the files to /vendor.
- **project**: For example application shells like the Symfony standard edition, CMSs like the SilverStripe installer or full fledged applications distributed as packages.
- metapackage: An empty package that contains requirements and will trigger their installation, but contains no files and will not write anything to the filesystem.
- composer-plugin: A package of type composer-plugin may provide an installer for other packages that have a custom type. Only use a custom type if you need custom logic during installation. 
