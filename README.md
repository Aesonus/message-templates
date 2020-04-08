# Message Templates

This library contains some classes to help with rendering messages and other templates to the user.

## Usage

This package has many uses and is very versatile. Let's take a look.

### Template Sources

Template sources are used to provide the rendering object information about the template.

Let's look at an example

##### Set up array to source from

In this example, we will use a global constant to source the templates from

```php
const TEMPLATES = [
   'key1' => 'template string, %s',
   'key2' => 'template string two, %s',
]
``` 

##### Implement the message source interfaces

We will create a new class for each potential key that will inherit the getTemplate method
from an abstract base class. This is to ensure that each template will be represented 
by a discreet class which will return the correct template from the same source.

```php
abstract class ConstTemplateSource implements TemplateSourceInterface
{
    public function getTemplate(): string
    {
        return TEMPLATES[$this->key];
    }
}
```

```php
class Key1 extends ConstTemplateSource {
    protected $key = 'key1';
}
```


```php
class Key2 extends ConstTemplateSource {
    protected $key = 'key2';
}
```

### Template Rendering

Templates are rendered using classes that implement the RenderTemplateInterface.

Adding on to the previous example, we will use the included RenderVsprintfTemplate class

```php
// Create the render object
$template = new RenderVsprintfTemplate();

// Set the template source for the render object
$template->setSource(new Key1);

//Output the template with data
echo $template->render(['purple']);

//Outputs: template string, purple

// Set another template source for the render object
$template->setSource(new Key2);

//Output the template with data
echo $template->render(['red']);

//Outputs: template string two, red
```

#### Other rendering implementations

Many other rendering implementations can be created using the RenderTemplateInterface.
This can allow for using engines like twig to render templates using the same sources or
even setting variables in other classes to a rendered template.