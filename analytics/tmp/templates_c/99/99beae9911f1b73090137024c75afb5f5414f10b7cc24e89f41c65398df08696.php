<?php

/* @ProfessionalServices/promoServicesWidget.twig */
class __TwigTemplate_7027fcd5aa6353fa965f96a7845b4818f52c4a28d7b8137d06e007a3e23e1dfa extends Twig_Template
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
        echo "<div class=\"promoWidget\">
    <div class=\"promo\">
        <img class=\"icon\" src=\"plugins/ProfessionalServices/images/promo.png\">
        <p class=\"text\">
            ";
        // line 5
        echo \Piwik\piwik_escape_filter($this->env, ($context["ctaText"] ?? $this->getContext($context, "ctaText")), "html", null, true);
        echo "
            <br /><br />
            <a class=\"btn\" href=\"";
        // line 7
        echo \Piwik\piwik_escape_filter($this->env, ($context["ctaLinkUrl"] ?? $this->getContext($context, "ctaLinkUrl")), "html_attr");
        echo "\" target=\"_blank\" rel=\"noreferrer\">
                ";
        // line 8
        echo \Piwik\piwik_escape_filter($this->env, ($context["ctaLinkTitle"] ?? $this->getContext($context, "ctaLinkTitle")), "html", null, true);
        echo "
            </a>
        </p>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "@ProfessionalServices/promoServicesWidget.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 8,  30 => 7,  25 => 5,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"promoWidget\">
    <div class=\"promo\">
        <img class=\"icon\" src=\"plugins/ProfessionalServices/images/promo.png\">
        <p class=\"text\">
            {{ ctaText }}
            <br /><br />
            <a class=\"btn\" href=\"{{ ctaLinkUrl|e('html_attr') }}\" target=\"_blank\" rel=\"noreferrer\">
                {{ ctaLinkTitle }}
            </a>
        </p>
    </div>
</div>", "@ProfessionalServices/promoServicesWidget.twig", "/var/www/html/analytics/plugins/ProfessionalServices/templates/promoServicesWidget.twig");
    }
}
