# Git-Download
Git-Download is a command-line tool that allows you to download files from any site. Currently it only supports downloading zip files and unzipping them.  
Why use this? This is an easy to use tool that allows you to download files that may otherwise be blocked by work/school systems.
## Installation
[![Open in Gitpod](https://gitpod.io/button/open-in-gitpod.svg)](https://gitpod.io/#https://github.com/mamamia5x/Git-Download)

Running in Gitpod will install everything needed and will run this in browser.

These steps below are already covered if opened in Gitpod:
*   You'll need to have php installed, which can be found [here](https://www.php.net/downloads.php).
*   You'll also need ZipArchive, which can be installed with the command `sudo apt get install php7.4-zip`.

If not, you'll need to run the following commands: 
```bash
git clone https://github.com/mamamia5x/Git-Download.git
cd Git-Download
```
## Usage
Commands: 
* [`zip`](#zip) - allows the user to download and unzip a zip file.

### zip
The zip command allows the user to downloand and unzip a zip file.
```bash
php commands/index.php zip [Link to file] [Folder]
```
Replace [Link to file] with the url of the zip file.  
Replace [Folder] with the desired location of the contents.

## Version History
#### Current Version is V.0.1.2
* V.0.1.2
    * Testing update
* V.0.1.1
    * Changed syntax
* V.0.1.0
    * First working build of Git-Download.
    * Allows user to download zips and unzips them.