<?php

/* themes/b_forcontu/templates/field/field--node--title.html.twig */
class __TwigTemplate_ffb0a03a0158af50dfe5613ffb096c87d42927a58b91c7a53e4299546eccbec5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            '__internal_31de20cbdc0896bc1343e7faa6d09bbfd8db65c288d0fe2c314e49007a8d7e50' => array($this, 'block___internal_31de20cbdc0896bc1343e7faa6d09bbfd8db65c288d0fe2c314e49007a8d7e50'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("set" => 23, "for" => 31, "filter" => 32, "trans" => 73, "if" => 95);
        $filters = array("clean_class" => 25, "upper" => 32, "lower" => 44, "capitalize" => 47, "date" => 53, "join" => 56, "sort" => 62, "length" => 65, "t" => 71, "placeholder" => 82);
        $functions = array("url" => 71);

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('set', 'for', 'filter', 'trans', 'if'),
                array('clean_class', 'upper', 'lower', 'capitalize', 'date', 'join', 'sort', 'length', 't', 'placeholder'),
                array('url')
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 23
        $context["classes"] = array(0 => "field", 1 => ("field--name-" . \Drupal\Component\Utility\Html::getClass(        // line 25
($context["field_name"] ?? null))), 2 => ("field--type-" . \Drupal\Component\Utility\Html::getClass(        // line 26
($context["field_type"] ?? null))), 3 => ("field--label-" .         // line 27
($context["label_display"] ?? null)));
        // line 30
        echo "<span";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["attributes"] ?? null), "addClass", array(0 => ($context["classes"] ?? null)), "method"), "html", null, true));
        echo ">";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 32
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_upper_filter($this->env,             $this->renderBlock("__internal_31de20cbdc0896bc1343e7faa6d09bbfd8db65c288d0fe2c314e49007a8d7e50", $context, $blocks)), "html", null, true));
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "------------------<br>
  ";
        // line 38
        $context["foo"] = "welcome";
        echo " ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_upper_filter($this->env, ($context["foo"] ?? null)), "html", null, true));
        echo "
  ";
        // line 40
        echo "  ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_upper_filter($this->env, "welcome"), "html", null, true));
        echo "
  ";
        // line 43
        echo "  ------------------<br>
  ";
        // line 44
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_lower_filter($this->env, "WELCOME"), "html", null, true));
        echo "
  ";
        // line 46
        echo "  ------------------<br>
  ";
        // line 47
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_capitalize_string_filter($this->env, "welcome home"), "html", null, true));
        echo "
  ";
        // line 49
        echo "  ------------------<br>
  ";
        // line 50
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_capitalize_string_filter($this->env, "welcome home"), "html", null, true));
        echo "
  ";
        // line 52
        echo "  ------------------<br>
  ";
        // line 53
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_date_format_filter($this->env, "now", "d/m/Y"), "html", null, true));
        echo "
  ";
        // line 55
        echo "  ------------------<br>
  ";
        // line 56
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_join_filter(array(0 => 1, 1 => 2, 2 => 3)), "html", null, true));
        echo "
  ";
        // line 58
        echo "
  ";
        // line 59
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_join_filter(array(0 => 1, 1 => 2, 2 => 3), ","), "html", null, true));
        echo "
  ";
        // line 61
        echo "  ------------------<br>
  ";
        // line 62
        $context["foo"] = twig_sort_filter(array(0 => 3, 1 => 2, 2 => 4, 3 => 1));
        // line 63
        echo "  ";
        // line 64
        echo "  ------------------<br>
  ";
        // line 65
        $context["count"] = twig_length_filter($this->env, ($context["users"] ?? null));
        // line 66
        echo "  ";
        // line 67
        echo "</span>

<div >
<h3>Traducciones</h3>
<a href=\"";
        // line 71
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("<front>")));
        echo "\" title=\"";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Home")));
        echo "\" rel=\"home\" class=\"site-logo\">";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Home")));
        echo "</a>
<h2>";
        // line 72
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Book traversal links for")));
        echo " ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["book_title"] ?? null), "html", null, true));
        echo "</h2> <b>";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Not triggered")));
        echo "</b>
";
        // line 73
        echo t("Submitted by @author_name on @date", array("@author_name" =>         // line 74
($context["author_name"] ?? null), "@date" => ($context["date"] ?? null), ));
        // line 76
        echo "<br>
";
        // line 77
        echo t("Submitted by @author_name on @date", array("@author_name" =>         // line 78
($context["author_name"] ?? null), "@date" => ($context["date"] ?? null), ));
        // line 79
        echo t("<br>
This @token.name has a length of: @count. It contains:
%token.numbers and @token.bad_text.", array("@token.name" => $this->getAttribute(        // line 81
($context["token"] ?? null), "name", array()), "@count" => ($context["count"] ?? null), "%token.numbers" => $this->getAttribute(        // line 82
($context["token"] ?? null), "numbers", array()), "@token.bad_text" => $this->getAttribute(($context["token"] ?? null), "bad_text", array()), ));
        // line 83
        echo "</div>
<div>
placeholder
";
        // line 86
        $context["temp"] = "The value is < 5";
        echo " ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapePlaceholder($this->env, ($context["temp"] ?? null))));
        echo "
</div>

<div>
<h3>usuarios</h3>
<h1>Users</h1> <ul>
";
        // line 92
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            echo " <li>";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["user"], "name", array()), "html", null, true));
            echo "</li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        echo " </ul>
<h3>titulo if </h3>
";
        // line 95
        if ((twig_length_filter($this->env, $this->getAttribute(($context["item"] ?? null), "content", array())) > 0)) {
            // line 96
            echo "  <h1>";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["item"] ?? null), "content", array()), "html", null, true));
            echo "</h1>
";
        }
        // line 98
        echo "
</div>";
    }

    // line 32
    public function block___internal_31de20cbdc0896bc1343e7faa6d09bbfd8db65c288d0fe2c314e49007a8d7e50($context, array $blocks = array())
    {
        // line 33
        echo "      ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["item"] ?? null), "content", array()), "html", null, true));
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "themes/b_forcontu/templates/field/field--node--title.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  239 => 33,  236 => 32,  231 => 98,  225 => 96,  223 => 95,  219 => 93,  207 => 92,  196 => 86,  191 => 83,  189 => 82,  188 => 81,  185 => 79,  183 => 78,  182 => 77,  179 => 76,  177 => 74,  176 => 73,  168 => 72,  160 => 71,  154 => 67,  152 => 66,  150 => 65,  147 => 64,  145 => 63,  143 => 62,  140 => 61,  136 => 59,  133 => 58,  129 => 56,  126 => 55,  122 => 53,  119 => 52,  115 => 50,  112 => 49,  108 => 47,  105 => 46,  101 => 44,  98 => 43,  93 => 40,  87 => 38,  84 => 37,  70 => 32,  53 => 31,  49 => 30,  47 => 27,  46 => 26,  45 => 25,  44 => 23,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#
/**
 * @file
 * Theme override for the node title field.
 *
 * This is an override of field.html.twig for the node title field. See that
 * template for documentation about its details and overrides.
 *
 * Available variables:
 * - attributes: HTML attributes for the containing span element.
 * - items: List of all the field items. Each item contains:
 *   - attributes: List of HTML attributes for each item.
 *   - content: The field item content.
 * - entity_type: The entity type to which the field belongs.
 * - field_name: The name of the field.
 * - field_type: The type of the field.
 * - label_display: The display settings for the label.
 *
 * @see field.html.twig
 */
#}
{%
  set classes = [
    'field',
    'field--name-' ~ field_name|clean_class,
    'field--type-' ~ field_type|clean_class,
    'field--label-' ~ label_display,
  ]
%}
<span{{ attributes.addClass(classes) }}>
  {%- for item in items -%}
    {% filter upper %}
      {{ item.content }}
    {% endfilter %}
  {%- endfor -%}

  ------------------<br>
  {% set foo = 'welcome' %} {{ foo|upper }}
  {# La salida será: WELCOME #}
  {{ 'welcome'|upper }}
  {# también se puede utilizar el filtro directamente sobre una cadena, obteniéndose el mismo resultado
  #}
  ------------------<br>
  {{ 'WELCOME'|lower }}
  {# Resultado: welcome #}
  ------------------<br>
  {{ 'welcome home'|capitalize }}
  {# Resultado: Welcome home #}
  ------------------<br>
  {{'welcome home'|capitalize }}
  {# Resultado: Welcome Home #}
  ------------------<br>
  {{ \"now\"|date(\"d/m/Y\") }}
  {# Resultado: 13/02/2016 #}
  ------------------<br>
  {{[1, 2, 3]|join }}
  {# Resultado: 123 #}

  {{ [1, 2, 3]|join(',') }}
  {# Resultado: 1,2,3 #}
  ------------------<br>
  {% set foo = [3, 2, 4, 1]|sort %}
  {# El contenido de la variable for será: [1, 2, 3, 4] #}
  ------------------<br>
  {% set count = users|length %}
  {# Almacena en la variable count el número de elementos de user #}
</span>

<div >
<h3>Traducciones</h3>
<a href=\"{{ url('<front>') }}\" title=\"{{ 'Home'|t }}\" rel=\"home\" class=\"site-logo\">{{ 'Home'|t }}</a>
<h2>{{ 'Book traversal links for'|t }} {{ book_title }}</h2> <b>{{ 'Not triggered'|t }}</b>
{% trans %}
Submitted by {{ author_name }} on {{ date }}
{% endtrans %}
<br>
{% trans %}
  Submitted by {{ author_name }} on {{ date }}{% endtrans %}
{% trans %}
<br>
This {{ token.name }} has a length of: {{ count }}. It contains:
{{ token.numbers|placeholder }} and {{ token.bad_text }}. {% endtrans %}
</div>
<div>
placeholder
{% set temp = 'The value is < 5' %} {{ temp|placeholder }}
</div>

<div>
<h3>usuarios</h3>
<h1>Users</h1> <ul>
{% for user in users %} <li>{{ user.name }}</li>
{% endfor %} </ul>
<h3>titulo if </h3>
{% if item.content|length > 0 %}
  <h1>{{ item.content }}</h1>
{% endif %}

</div>", "themes/b_forcontu/templates/field/field--node--title.html.twig", "/Users/bits/Sites/pruebas/bits/themes/b_forcontu/templates/field/field--node--title.html.twig");
    }
}
