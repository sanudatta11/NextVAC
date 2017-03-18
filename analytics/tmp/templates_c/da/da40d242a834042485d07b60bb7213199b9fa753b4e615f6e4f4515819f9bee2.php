<?php

/* @API/listAllAPI.twig */
class __TwigTemplate_350248d54e9f9448153bbc593b1129770cb4b93f0a53adf3d93773ea679cb60e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.twig", "@API/listAllAPI.twig", 1);
        $this->blocks = array(
            'topcontrols' => array($this, 'block_topcontrols'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "admin.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("API_ReportingApiReference")), "html", null, true);
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_topcontrols($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->loadTemplate("@CoreHome/_siteSelectHeader.twig", "@API/listAllAPI.twig", 6)->display($context);
        // line 7
        echo "    ";
        $this->loadTemplate("@CoreHome/_periodSelect.twig", "@API/listAllAPI.twig", 7)->display($context);
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "
<div class=\"api-list\">
    <div piwik-content-block content-title=\"";
        // line 13
        echo \Piwik\piwik_escape_filter($this->env, ($context["title"] ?? $this->getContext($context, "title")), "html", null, true);
        echo "\" rate=\"true\">
        <p>";
        // line 14
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("API_PluginDescription")), "html", null, true);
        echo "</p>

        <p>
            ";
        // line 17
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("API_MoreInformation", "<a target='_blank' href='?module=Proxy&action=redirect&url=http://piwik.org/docs/analytics-api'>", "</a>", "<a target='_blank' href='?module=Proxy&action=redirect&url=http://piwik.org/docs/analytics-api/reference'>", "</a>"));
        echo "
        </p>
    </div>
    <div piwik-content-block content-title=\"";
        // line 20
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("API_UserAuthentication")), "html_attr");
        echo "\">
        <p>
            ";
        // line 22
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("API_UsingTokenAuth", "", "", ""));
        echo "<br/>
            <pre piwik-select-on-focus id='token_auth'>&amp;token_auth=<strong piwik-show-sensitive-data=\"";
        // line 23
        echo \Piwik\piwik_escape_filter($this->env, ($context["token_auth"] ?? $this->getContext($context, "token_auth")), "html", null, true);
        echo "\" data-click-element-selector=\"#token_auth\"></strong></pre><br/>
            ";
        // line 24
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("API_KeepTokenSecret", "<b>", "</b>"));
        echo "<br />
            ";
        // line 25
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("API_ChangeTokenHint", (("<a href=\"" . call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("module" => "UsersManager", "action" => "userSettings")))) . "\">"), "</a>"));
        // line 28
        echo "
        </p>
    </div>
    ";
        // line 31
        echo ($context["list_api_methods_with_links"] ?? $this->getContext($context, "list_api_methods_with_links"));
        echo "
    <br/>
</div>
";
    }

    public function getTemplateName()
    {
        return "@API/listAllAPI.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 31,  87 => 28,  85 => 25,  81 => 24,  77 => 23,  73 => 22,  68 => 20,  62 => 17,  56 => 14,  52 => 13,  48 => 11,  45 => 10,  40 => 7,  37 => 6,  34 => 5,  30 => 1,  26 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'admin.twig' %}

{% set title %}{{ 'API_ReportingApiReference'|translate }}{% endset %}

{% block topcontrols %}
    {% include \"@CoreHome/_siteSelectHeader.twig\" %}
    {% include \"@CoreHome/_periodSelect.twig\" %}
{% endblock %}

{% block content %}

<div class=\"api-list\">
    <div piwik-content-block content-title=\"{{ title }}\" rate=\"true\">
        <p>{{ 'API_PluginDescription'|translate }}</p>

        <p>
            {{ 'API_MoreInformation'|translate(\"<a target='_blank' href='?module=Proxy&action=redirect&url=http://piwik.org/docs/analytics-api'>\",\"</a>\",\"<a target='_blank' href='?module=Proxy&action=redirect&url=http://piwik.org/docs/analytics-api/reference'>\",\"</a>\")|raw }}
        </p>
    </div>
    <div piwik-content-block content-title=\"{{ 'API_UserAuthentication'|translate|e('html_attr') }}\">
        <p>
            {{ 'API_UsingTokenAuth'|translate('','',\"\")|raw }}<br/>
            <pre piwik-select-on-focus id='token_auth'>&amp;token_auth=<strong piwik-show-sensitive-data=\"{{ token_auth }}\" data-click-element-selector=\"#token_auth\"></strong></pre><br/>
            {{ 'API_KeepTokenSecret'|translate('<b>','</b>')|raw }}<br />
            {{ 'API_ChangeTokenHint'|translate('<a href=\"' ~ linkTo({
                'module': 'UsersManager',
                'action': 'userSettings',
            }) ~ '\">', '</a>')|raw }}
        </p>
    </div>
    {{ list_api_methods_with_links|raw }}
    <br/>
</div>
{% endblock %}
", "@API/listAllAPI.twig", "/var/www/html/analytics/plugins/API/templates/listAllAPI.twig");
    }
}
