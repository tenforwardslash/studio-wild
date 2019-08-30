# studio wild theme

we use sass now!

make sure you have sass installed globally 

```bash
$ npm install --global sass
``` 


now you need to enable either an SCSS file watcher in idea with these arguments on the sass tool: 

```
$FileName$:$FileNameWithoutExtension$.min.css --style compressed
```


or run sass watch

```bash
$ sass --watch studiowild.scss:studiowild.min.css --style compressed
```