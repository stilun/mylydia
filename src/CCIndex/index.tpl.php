<h2>Index Controller</h2>
<p>Welcome to Lydia index controller.</p>

<h3>Download</h3>
<p>You can download Lydia from github.</p>
<blockquote>
<code>git clone git://github.com/stilun/mylydia.git</code>
</blockquote>
<p>You can review its source directly on github: <a href='https://github.com/stilun/mylydia' target='_blank'>https://github.com/stilun/mylydia</a></p>

<h3>Installation</h3>
<p>First you have to make the data-directory writable. This is the place where Lydia needs
to be able to write and create files.</p>
<blockquote>
<code>cd mylydia; chmod 777 site/data</code>
</blockquote>

<p>Second, Lydia has some modules that need to be initialised. You can do this through a
controller. Point your browser to the following link.</p>
<blockquote>
<a href='<?=create_url('module/install')?>'>module/install</a>
</blockquote>

