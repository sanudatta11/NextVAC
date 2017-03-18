<?php

/* @CoreHome/_applePinnedTabIcon.twig */
class __TwigTemplate_f769d0e50a6b085315256d62e4274c45381be24c824041d8db764f7406c1c45f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if (((($context["isCustomLogo"] ?? $this->getContext($context, "isCustomLogo")) && array_key_exists("customFavicon", $context)) && ($context["customFavicon"] ?? $this->getContext($context, "customFavicon")))) {
        } else {
            // line 3
            echo "\t<link rel=\"mask-icon\" href=\"plugins/CoreHome/images/applePinnedTab.svg\" color=\"#d4291f\">
";
        }
    }

    public function getTemplateName()
    {
        return "@CoreHome/_applePinnedTabIcon.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if isCustomLogo and customFavicon is defined and customFavicon %}
{% else %}
\t<link rel=\"mask-icon\" href=\"plugins/CoreHome/images/applePinnedTab.svg\" color=\"#d4291f\">
{% endif %}
", "@CoreHome/_applePinnedTabIcon.twig", "/var/www/html/analytics/plugins/CoreHome/templates/_applePinnedTabIcon.twig");
    }
}
