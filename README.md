My MVC project in Lydia.
==============================
Slutversionen av mitt MVC-projekt MyLydia, som är baserat på ramverket Lydia
skapat av Mikael Roos, lärare på Blekinge Tekniska Högskola.

Installation av MyLydia
-----------------------

1. Klona ramverket från GitHub `git clone git://github.com/stilun/mylydia.git` eller gå in på `https://github.com/stilun/mylydia` och ladda ner det som en zip-fil och lägg filerna på en lämplig plats i din dator. Öppna ramverket med `cd mylydia` i Git Bash eller i Terminal.  

2. Innan du laddar upp ramverket på studentservern behöver du öppna `.htaccess` och skriva in sökvägen till platsen där du tänker installera ramverket. Ändra i RewriteBase `RewriteBase /~stlu12/phpmvc/kmom07/lydia/`

3. För att ramverket ska fungera behöver du göra katalogen `site/data` skrivbar. Du gör den skrivbar med `chmod 777 site/data`. 
Om det inte fungerar som det ska kan du göra katalogerna skrivbara i studentservern. Använd tex. sftp i FileZilla.
Högerklicka på katalogen, välj filrättigheter och skriv 777. Du måste också göra filen `.ht.sqlite` som finns i katalogen `site/data` skrivbar. Gör samma sak som för katalogen men skriv i stället 666. 

4. Öppna ramverket i din webbläsare och klicka på `module/install` på startsidan Index Controller för att slutföra installationen.

Användning av ramverket
-----------------------
Nu är grundinstallationen av ramverket klart och kan börja användas.
Uppe i högra hörnet finns en login-länk. Klicka på den och prova att logga in med `root:root` för administratör och `doe:doe` för member.<br>
Om din inloggning lyckas så kan du ändra användarens kontouppgifter, såsom lösenord, email och namn.

Skapa content
-------------
Klicka på Content i menyn längst upp på sidan. Nu laddas sidan Content Controller. I spalten actions längst ner på sidan finns länken create new content. Klicka på den.

Nu laddas formuläret Create Content. 
* Title är bloggposten/sidans titel,
* Key är ett nyckelord. Här får du inte ha mellenslag. Dvs. skriv tex. ny-sida i stället för ny sida.
* Content är en textarea, här skriver du in brödtext. Tänk på att implementera de filter som du vill ha.
* Type, här skriver du vilken form av content man skapar.
	&nbsp;<br>För att skapa blogginlägg, skriv post. 
	&nbsp;<br>För att skapa en sida, skriv page. 
* Filter, här kan du ange olika filter beroende på om man har implementerat dessa i brödtexten. 
	&nbsp;<br>Filter: htmlpurify, bbcode och plain. Om inga filter önskas, fyll i plain.
	
Ändra namn/sökvägar på content
------------------------------
Navigera till: `site/config.php` och öppna den i en texteditor.

För att ändra namn på någon av länkarna, tex. About Me, editera då texten: `'label'=>'About Me'`. I detta fall About Me, om den ändras till About You. Så kommer detta att synas i navigationen på sidan.

```PHP
  'my-navbar' => array(
    'home' => array('label'=>'About Me', 'url'=>'my'),
    'blog' => array('label'=>'My Blog', 'url'=>'my/blog'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'my/guestbook'),
    'module' => array('label'=>'Modules', 'url'=>'module'),
    'content' => array('label'=>'Content', 'url'=>'content'),
    'user' => array('label'=>'User', 'url'=>'user'),

```

Lägga till en page
------------------
Följ stegen för Skapa content här ovan för att skapa en ny page. Klicka på Content i menyn. Kolla i listan på sidan Content Controller.
Ditt nyss skapade content ska ha lagts till i denna lista längst ner. Den har då fått ett nummer. Som standard så skapas 8 contents som default. Ditt nya content bör därför ha fått nummer 9.
Denna siffra behövs för att kunna länka till den nya sidan/page.

Det vi nu vill göra är att skapa en menylänk som visar sidan. 
Navigera till: `site/config.php` och öppna den i en texteditor. Gå till `my-navbar` och lägg till den nya sidan i den ursprungliga menyn.

```PHP
  'my-navbar' => array(
    'home' => array('label'=>'About Me', 'url'=>'my'),
    'blog' => array('label'=>'My Blog', 'url'=>'my/blog'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'my/guestbook'),
    'module' => array('label'=>'Modules', 'url'=>'module'),
    'content' => array('label'=>'Content', 'url'=>'content'),
    'user' => array('label'=>'User', 'url'=>'user'),
    <b>'newpage' => array('label'=>'New Page', 'url'=>'page/view/9')</b>, /* Denna rad läggs till för att skapa en ny länk till sidan*/
```

Editera designen
-----------------
Navigera till: `site/config.php` och öppna den i en texteditor.
Här kan du sedan editera en hel del saker som rör designen på hemsidan såsom, logotype, favicon, slogan, navigeringsmeny, header och footer.
För att ändra till exempel logo, ladda upp logotypen till mappen `site/themes/mytheme/`.<br>
Detta gör filen åtkomstbar via sökvägarna(OBS! Du kan behöva ändra filrättighet på bilden till 666.)
Gå sen ner till rad `'logo' => 'logo_80x80.png'`. Skriv in det nya namnet i stället för `logo_80x80.png`. Gör på samma sätt om du vill ändra på favicon.<br>

För att ändra på footern, ändra i raden: `'footer' => '<p>Lydia &copy; by Stig Lundmark (stig@stilun.de)</p>',`.

För att ändringarna ska fungera, ladda upp den sparade filen till servern igen.

<b>site/config.php:</b>
```PHP
$ly->config['theme'] = array(
  'path' => 'site/themes/mytheme',
  'parent' => 'themes/grid',
  'stylesheet' => 'style.css',
  'template_file' => 'index.tpl.php',
  'regions' => array('navbar', 'flash','featured-first','featured-middle','featured-last',
    'primary','sidebar','triptych-first','triptych-middle','triptych-last',
    'footer-column-one','footer-column-two','footer-column-three','footer-column-four',
    'footer',
  ),
  'menu_to_region' => array('my-navbar'=>'navbar'),
  'data' => array(
    'header' => 'MyLydia',
    'slogan' => 'A PHP-based MVC-inspired CMF',
    'favicon' => 'logo_80x80.png',
    'logo' => 'logo_80x80.png',
    'logo_width' => 80,
    'logo_height' => 80,
    'footer' => '<p>Lydia &copy; by Stig Lundmark (stig@stilun.de)</p>',
  ),
);
```

Ändring av utseende/style med hjälp av CSS
------------------------------------------

För att ändra färg och font, navigera till site/themes/mytheme/style.css och öppna den i valfri texteditor.
<b>site/themes/mythemes/style.css:</b>
```CSS
/**
* Description: Sample theme for site which extends the Lydia grid-theme.
*/
@import url(../../../themes/grid/style.css);

html{background-color:#FFFFFF;}
body
{
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 15px;
	color: #333333;
	background-color:#FFFFFF;
}
#main-wrap 
{  
	width:950px;
	margin:8px auto;
	padding:1em;

	border:1px solid #999;
	border-radius: 10px;
}

#outer-wrap-header
{
	border:1px solid #999;
	border-radius: 10px;
	background-color:#FFE2B3;
	border-bottom:2px solid #FFCE80
}
#outer-wrap-footer
{
	border:1px solid #999;
	border-radius: 10px;
	padding:1em;	
	background-color:#FFE2B3
}

#outer-wrap-main
{
	background-color:#DDD;
	border:1px solid #999;
	padding:1em;
	border-radius: 10px;
}

.box
{
	float:left;
	padding:1em;
	margin:0 30px;
}

#login-menu
{
	margin:0 10px;
}
.error, .alert, .warning, .notice, .success, .info
{
	border-radius: 8px;
	width:510px;
}

a{color:#436370}
#navbar ul.menu li a.selected{background-color:#FFFFFF;border-bottom:none;}
```

Vill man göra mera genomgripande ändringar i ramverket gör man det i filen: <b>themes/grid/style.ccs</b>
