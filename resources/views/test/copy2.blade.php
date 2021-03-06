<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex, nofollow">
  <title>Massive inline editing</title>
  <script src="https://cdn.ckeditor.com/4.15.1/standard-all/ckeditor.js"></script>
</head>

<body>
  <style>
    /* The following styles are here just to make the "Massive Inline Editing" sample look nice. */

    /* A workaround to show Arial Black font in Firefox. */
    @font-face {
      font-family: 'arial-black';
      src: local('Arial Black');
    }

    #columns *[contenteditable="true"],
    #header *[contenteditable="true"] {
      padding: 10px;
    }

    #header {
      overflow: hidden;
      padding: 0 0 30px;
      border-bottom: 5px solid #05B2D2;
      position: relative;
      color: #333;
      background-color: #f9f9f9;
    }

    #headerLeft,
    #headerRight {
      width: 49%;
      overflow: hidden;
    }

    #headerLeft {
      float: left;
      padding: 10px 1px 1px;
    }

    #headerLeft h2,
    #headerLeft h3 {
      text-align: right;
      margin: 0;
      overflow: hidden;
      font-weight: normal;
    }

    #headerLeft h2 {
      font-family: "Arial Black", arial-black;
      font-size: 3.6em;
      line-height: 1.1;
      text-transform: uppercase;
    }

    #headerLeft h3 {
      font-size: 1.9em;
      line-height: 1.1;
      margin: .2em 0 0;
      color: #666;
    }

    #headerRight {
      float: right;
      padding: 1px;
    }

    #headerRight p {
      line-height: 1.8;
      text-align: justify;
      margin: 0;
    }

    #headerRight p+p {
      margin-top: 20px;
    }

    #headerRight>div {
      padding: 20px;
      margin: 0 0 0 30px;
      font-size: 1.2em;
      color: #666;
    }

    #columns {
      color: #333;
      overflow: hidden;
      padding: 20px 0;
      font-size: 0.9em;
      background-color: #f9f9f9;
    }

    #columns>div {
      float: left;
      width: 33.3%;
    }

    #columns #column1>div {
      margin-left: 1px;
    }

    #columns #column3>div {
      margin-right: 1px;
    }

    #columns>div>div {
      margin: 0px 10px;
      padding: 10px 20px;
    }

    #columns blockquote {
      margin-left: 15px;
    }
  </style>
  <div id="header">
    <div id="headerLeft">
      <h2 id="sampleTitle" contenteditable="true">
        CKEditor 4<br> Goes Inline!
      </h2>

      <h3 contenteditable="true">
        Lorem ipsum dolor sit amet dolor duis blandit vestibulum faucibus a, tortor.
      </h3>
    </div>
    <div id="headerRight">
      <div contenteditable="true">
        <p>
          Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies.
        </p>

        <p>
          Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulum commodo volutpat a, convallis ac, laoreet enim. Phasellus fermentum in, dolor. Pellentesque facilisis.
          Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada fames ac.
        </p>
      </div>
    </div>
  </div>
  <div id="columns">
    <div id="column1">
      <div contenteditable="true">
        <h3>
          Fusce vitae porttitor
        </h3>

        <p>
          <strong>Lorem ipsum dolor sit amet dolor. Duis blandit vestibulum faucibus a, tortor.</strong>
        </p>

        <p>
          Proin nunc justo felis mollis tincidunt, risus risus pede, posuere cubilia Curae, Nullam euismod, enim. Etiam nibh ultricies dolor ac dignissim erat volutpat. Vivamus fermentum <a href="https://ckeditor.com/">nisl nulla sem in</a> metus. Maecenas wisi. Donec nec erat volutpat.
        </p>
        <blockquote>
          <p>
            Fusce vitae porttitor a, euismod convallis nisl, blandit risus tortor, pretium.
            Vehicula vitae, imperdiet vel, ornare enim vel sodales rutrum
          </p>
        </blockquote>
        <blockquote>
          <p>
            Libero nunc, rhoncus ante ipsum non ipsum. Nunc eleifend pede turpis id sollicitudin fringilla. Phasellus ultrices, velit ac arcu.
          </p>
        </blockquote>
        <p>Pellentesque nunc. Donec suscipit erat. Pellentesque habitant morbi tristique ullamcorper.</p>

        <p><s>Mauris mattis feugiat lectus nec mauris. Nullam vitae ante.</s></p>
      </div>
    </div>
    <div id="column2">
      <div contenteditable="true">
        <h3>
          Integer condimentum sit amet
        </h3>

        <p>
          <strong>Aenean nonummy a, mattis varius. Cras aliquet.</strong>
          Praesent <a href="https://ckeditor.com/">magna non mattis ac, rhoncus nunc</a>, rhoncus eget, cursus pulvinar mollis.
        </p>

        <p>
          Proin id nibh. Sed eu libero posuere sed, lectus. Phasellus dui gravida gravida feugiat mattis ac, felis.
        </p>

        <p>
          Integer condimentum sit amet, tempor elit odio, a dolor non ante at sapien. Sed ac lectus. Nulla ligula quis eleifend mi, id leo velit pede cursus arcu id nulla ac lectus. Phasellus vestibulum. Nunc viverra enim quis diam.
        </p>
      </div>
      <div contenteditable="true">
        <h3>
          Praesent wisi accumsan sit amet nibh
        </h3>

        <p>
          Donec ullamcorper, risus tortor, pretium porttitor. Morbi quam quis lectus non leo.
        </p>

        <p style="margin-left: 40px; ">
          Integer faucibus scelerisque. Proin faucibus at, aliquet vulputate, odio at eros. Fusce <a href="https://ckeditor.com/">gravida, erat vitae augue</a>. Fusce urna fringilla gravida.
        </p>

        <p>
          In hac habitasse platea dictumst. Praesent wisi accumsan sit amet nibh. Maecenas orci luctus a, lacinia quam sem, posuere commodo, odio condimentum tempor, pede semper risus. Suspendisse pede. In hac habitasse platea dictumst. Nam sed laoreet sit amet erat. Integer.
        </p>
      </div>
    </div>
    <div id="column3">
      <div contenteditable="true">
        <p>
          <img src="assets/inline/logo.png" alt="CKEditor logo" style="float:left">
        </p>

        <p>
          Quisque justo neque, mattis sed, fermentum ultrices <strong>posuere cubilia Curae</strong>, Vestibulum elit metus, quis placerat ut, lectus. Ut sagittis, nunc libero, egestas consequat lobortis velit rutrum ut, faucibus turpis. Fusce porttitor, nulla quis turpis. Nullam laoreet vel, consectetuer tellus suscipit ultricies, hendrerit wisi. Donec odio nec velit ac nunc sit amet, accumsan cursus aliquet. Vestibulum ante sit amet sagittis mi.
        </p>

        <h3>
          Nullam laoreet vel consectetuer tellus suscipit
        </h3>
        <ul>
          <li>Ut sagittis, nunc libero, egestas consequat lobortis velit rutrum ut, faucibus turpis.</li>
          <li>Fusce porttitor, nulla quis turpis. Nullam laoreet vel, consectetuer tellus suscipit ultricies, hendrerit wisi.</li>
          <li>Mauris eget tellus. Donec non felis. Nam eget dolor. Vestibulum enim. Donec.</li>
        </ul>
        <p>
          Quisque justo neque, mattis sed, <a href="https://ckeditor.com/">fermentum ultrices posuere cubilia</a> Curae, Vestibulum elit metus, quis placerat ut, lectus.
        </p>

        <p>
          Nullam laoreet vel, consectetuer tellus suscipit ultricies, hendrerit wisi. Ut sagittis, nunc libero, egestas consequat lobortis velit rutrum ut, faucibus turpis. Fusce porttitor, nulla quis turpis.
        </p>

        <p>
          Donec odio nec velit ac nunc sit amet, accumsan cursus aliquet. Vestibulum ante sit amet sagittis mi. Sed in nonummy faucibus turpis. Mauris eget tellus. Donec non felis. Nam eget dolor. Vestibulum enim. Donec.
        </p>
      </div>
    </div>
  </div>
  <script>
    // Sample: Massive Inline Editing

    // This code is generally not necessary, but it is here to demonstrate
    // how to customize specific editor instances on the fly. This fits this
    // demo well because some editable elements (like headers) may
    // require a smaller number of features.

    // The "instanceCreated" event is fired for every editor instance created.
    CKEDITOR.on('instanceCreated', function(event) {
      var editor = event.editor,
        element = editor.element;

      // Customize editors for headers and tag list.
      // These editors do not need features like smileys, templates, iframes etc.
      if (element.is('h1', 'h2', 'h3') || element.getAttribute('id') == 'taglist') {
        // Customize the editor configuration on "configLoaded" event,
        // which is fired after the configuration file loading and
        // execution. This makes it possible to change the
        // configuration before the editor initialization takes place.
        editor.on('configLoaded', function() {

          // Remove redundant plugins to make the editor simpler.
          editor.config.removePlugins = 'colorbutton,find,flash,font,' +
            'forms,iframe,image,newpage,removeformat,' +
            'smiley,specialchar,stylescombo,templates';

          // Rearrange the toolbar layout.
          editor.config.toolbarGroups = [{
              name: 'editing',
              groups: ['basicstyles', 'links']
            },
            {
              name: 'undo'
            },
            {
              name: 'clipboard',
              groups: ['selection', 'clipboard']
            },
            {
              name: 'about'
            }
          ];
        });
      }
    });
  </script>
</body>

</html>