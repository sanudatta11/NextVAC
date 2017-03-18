<?php

/* admin.twig */
class __TwigTemplate_726c84842b456370363021580430870f48c97d17125eec77c2214c3ae10edd8b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "admin.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'root' => array($this, 'block_root'),
            'topcontrols' => array($this, 'block_topcontrols'),
            'notification' => array($this, 'block_notification'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_Administration")), "html", null, true);
        $context["categoryTitle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 5
        $context["bodyClass"] = call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.bodyClass", "admin"));
        // line 6
        $context["isAdminArea"] = true;
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 8
    public function block_body($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        $context["topMenuModule"] = "CoreAdminHome";
        // line 10
        echo "    ";
        $context["topMenuAction"] = "home";
        // line 11
        echo "    ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "
";
    }

    // line 14
    public function block_root($context, array $blocks = array())
    {
        // line 15
        echo "    ";
        $this->loadTemplate("@CoreHome/_topScreen.twig", "admin.twig", 15)->display($context);
        // line 16
        echo "
    <div class=\"top_controls\">
        <div piwik-quick-access ng-cloak class=\"piwikTopControl borderedControl\"></div>

        ";
        // line 20
        $this->displayBlock('topcontrols', $context, $blocks);
        // line 22
        echo "
        ";
        // line 23
        $this->loadTemplate("@CoreHome/_headerMessage.twig", "admin.twig", 23)->display($context);
        // line 24
        echo "    </div>

    ";
        // line 26
        $context["ajax"] = $this->loadTemplate("ajaxMacros.twig", "admin.twig", 26);
        // line 27
        echo "    ";
        echo $context["ajax"]->getrequestErrorDiv(((array_key_exists("emailSuperUser", $context)) ? (_twig_default_filter(($context["emailSuperUser"] ?? $this->getContext($context, "emailSuperUser")), "")) : ("")), ($context["areAdsForProfessionalServicesEnabled"] ?? $this->getContext($context, "areAdsForProfessionalServicesEnabled")), ($context["currentModule"] ?? $this->getContext($context, "currentModule")));
        echo "
    ";
        // line 28
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.beforeContent", "admin", ($context["currentModule"] ?? $this->getContext($context, "currentModule"))));
        echo "

    <div class=\"page\">

        ";
        // line 32
        if (( !array_key_exists("showMenu", $context) || ($context["showMenu"] ?? $this->getContext($context, "showMenu")))) {
            // line 33
            echo "            ";
            $context["menu"] = $this->loadTemplate("@CoreHome/_menu.twig", "admin.twig", 33);
            // line 34
            echo "            ";
            echo $context["menu"]->getmenu(($context["adminMenu"] ?? $this->getContext($context, "adminMenu")), false, "Menu--admin", ($context["currentModule"] ?? $this->getContext($context, "currentModule")), ($context["currentAction"] ?? $this->getContext($context, "currentAction")));
            echo "
        ";
        }
        // line 36
        echo "
        <div class=\"pageWrap\">
            <a name=\"main\"></a>
            ";
        // line 39
        $this->displayBlock('notification', $context, $blocks);
        // line 42
        echo "            ";
        $this->loadTemplate("@CoreHome/_warningInvalidHost.twig", "admin.twig", 42)->display($context);
        // line 43
        echo "
            <div class=\"admin\" id=\"content\" ng-cloak>

                <div class=\"ui-confirm\" id=\"alert\">
                    <h2></h2>
                    <input role=\"no\" type=\"button\" value=\"";
        // line 48
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Ok")), "html", null, true);
        echo "\"/>
                </div>

                ";
        // line 51
        $this->displayBlock('content', $context, $blocks);
        // line 53
        echo "
            </div>
        </div>
    </div>


";
    }

    // line 20
    public function block_topcontrols($context, array $blocks = array())
    {
        // line 21
        echo "        ";
    }

    // line 39
    public function block_notification($context, array $blocks = array())
    {
        // line 40
        echo "                ";
        $this->loadTemplate("@CoreHome/_notifications.twig", "admin.twig", 40)->display($context);
        // line 41
        echo "            ";
    }

    // line 51
    public function block_content($context, array $blocks = array())
    {
        // line 52
        echo "                ";
    }

    public function getTemplateName()
    {
        return "admin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 52,  157 => 51,  153 => 41,  150 => 40,  147 => 39,  143 => 21,  140 => 20,  130 => 53,  128 => 51,  122 => 48,  115 => 43,  112 => 42,  110 => 39,  105 => 36,  99 => 34,  96 => 33,  94 => 32,  87 => 28,  82 => 27,  80 => 26,  76 => 24,  74 => 23,  71 => 22,  69 => 20,  63 => 16,  60 => 15,  57 => 14,  50 => 11,  47 => 10,  44 => 9,  41 => 8,  37 => 1,  35 => 6,  33 => 5,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'layout.twig' %}

{% set categoryTitle %}{{ 'CoreAdminHome_Administration'|translate }}{% endset %}

{% set bodyClass = postEvent('Template.bodyClass', 'admin') %}
{% set isAdminArea = true %}

{% block body %}
    {% set topMenuModule = 'CoreAdminHome' %}
    {% set topMenuAction = 'home' %}
    {{ parent() }}
{% endblock %}

{% block root %}
    {% include \"@CoreHome/_topScreen.twig\" %}

    <div class=\"top_controls\">
        <div piwik-quick-access ng-cloak class=\"piwikTopControl borderedControl\"></div>

        {% block topcontrols %}
        {% endblock %}

        {% include \"@CoreHome/_headerMessage.twig\" %}
    </div>

    {% import 'ajaxMacros.twig' as ajax %}
    {{ ajax.requestErrorDiv(emailSuperUser|default(''), areAdsForProfessionalServicesEnabled, currentModule) }}
    {{ postEvent(\"Template.beforeContent\", \"admin\", currentModule) }}

    <div class=\"page\">

        {% if showMenu is not defined or showMenu %}
            {% import '@CoreHome/_menu.twig' as menu %}
            {{ menu.menu(adminMenu, false, 'Menu--admin', currentModule, currentAction) }}
        {% endif %}

        <div class=\"pageWrap\">
            <a name=\"main\"></a>
            {% block notification %}
                {% include \"@CoreHome/_notifications.twig\" %}
            {% endblock %}
            {% include \"@CoreHome/_warningInvalidHost.twig\" %}

            <div class=\"admin\" id=\"content\" ng-cloak>

                <div class=\"ui-confirm\" id=\"alert\">
                    <h2></h2>
                    <input role=\"no\" type=\"button\" value=\"{{ 'General_Ok'|translate }}\"/>
                </div>

                {% block content %}
                {% endblock %}

            </div>
        </div>
    </div>


{% endblock %}
", "admin.twig", "/var/www/html/analytics/plugins/Morpheus/templates/admin.twig");
    }
}
