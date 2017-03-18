<?php

/* @DevicesDetection/detection.twig */
class __TwigTemplate_c277a3a82ea9ae37e67ac9d515004fc804d4108da4bd6c432bea4b8e1649a165 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.twig", "@DevicesDetection/detection.twig", 1);
        $this->blocks = array(
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
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_DeviceDetection")), "html", null, true);
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
    <script type=\"text/javascript\">

        function showList(type) {
            var ajaxHandler = new ajaxHelper();
            ajaxHandler.addParams({
                module: 'DevicesDetection',
                action: 'showList',
                type: type
            }, 'GET');
            ajaxHandler.setFormat('html');
            ajaxHandler.setCallback(function(response){
                var \$list = \$('#deviceDetectionItemList');
                \$list.find('.itemList').html(response);
                piwikHelper.modalConfirm(\$list, [], {fixedFooter: true});
            });
            ajaxHandler.send();
        }

    </script>

    <style type=\"text/css\">
        textarea {
            width: 700px;
            display: block;
        }

        .detection {
            padding-top:10px;
        }
        .detection td {
            width: 50%;
        }
        .detection td img {
            margin-right: 10px;
        }
    </style>

    <div piwik-content-block content-title=\"";
        // line 44
        echo \Piwik\piwik_escape_filter($this->env, ($context["title"] ?? $this->getContext($context, "title")), "html_attr");
        echo "\">
        <h3>";
        // line 45
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_UserAgent")), "html_attr");
        echo "</h3>

        <form action=\"";
        // line 47
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array())), "html", null, true);
        echo "\" method=\"POST\">
            <textarea name=\"ua\">";
        // line 48
        echo \Piwik\piwik_escape_filter($this->env, ($context["userAgent"] ?? $this->getContext($context, "userAgent")), "html", null, true);
        echo "</textarea>
            <br />
            <input type=\"submit\" value=\"";
        // line 50
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Refresh")), "html", null, true);
        echo "\" />
        </form>

        <h3>";
        // line 53
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_ColumnOperatingSystem")), "html_attr");
        echo "</h3>
        <table class=\"detection\" piwik-content-table>
            <tbody>
            <tr>
                <td>";
        // line 57
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Name")), "html", null, true);
        echo " <small>(<a href=\"javascript:showList('os');\">";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Mobile_ShowAll")), "html", null, true);
        echo "</a>)</small></td>
                <td><img height=\"16px\" width=\"16px\" src=\"";
        // line 58
        echo \Piwik\piwik_escape_filter($this->env, ($context["os_logo"] ?? $this->getContext($context, "os_logo")), "html", null, true);
        echo "\" />";
        echo \Piwik\piwik_escape_filter($this->env, ($context["os_name"] ?? $this->getContext($context, "os_name")), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td>";
        // line 61
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CorePluginsAdmin_Version")), "html", null, true);
        echo "</td>
                <td>";
        // line 62
        echo \Piwik\piwik_escape_filter($this->env, ($context["os_version"] ?? $this->getContext($context, "os_version")), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td>";
        // line 65
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_OperatingSystemFamily")), "html", null, true);
        echo "  <small>(<a href=\"javascript:showList('osfamilies');\">";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Mobile_ShowAll")), "html", null, true);
        echo "</a>)</small></td>
                <td><img height=\"16px\" width=\"16px\" src=\"";
        // line 66
        echo \Piwik\piwik_escape_filter($this->env, ($context["os_family_logo"] ?? $this->getContext($context, "os_family_logo")), "html", null, true);
        echo "\" />";
        echo \Piwik\piwik_escape_filter($this->env, ($context["os_family"] ?? $this->getContext($context, "os_family")), "html", null, true);
        echo "</td>
            </tr>
            </tbody>
        </table>

        <h3>";
        // line 71
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_ColumnBrowser")), "html", null, true);
        echo "</h3>
        <table class=\"detection\" piwik-content-table>
            <tbody>
            <tr>
                <td>";
        // line 75
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Name")), "html", null, true);
        echo " <small>(<a href=\"javascript:showList('browsers');\">";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Mobile_ShowAll")), "html", null, true);
        echo "</a>)</small></td>
                <td><img height=\"16px\" width=\"16px\" src=\"";
        // line 76
        echo \Piwik\piwik_escape_filter($this->env, ($context["browser_logo"] ?? $this->getContext($context, "browser_logo")), "html", null, true);
        echo "\" />";
        echo \Piwik\piwik_escape_filter($this->env, ($context["browser_name"] ?? $this->getContext($context, "browser_name")), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td>";
        // line 79
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CorePluginsAdmin_Version")), "html", null, true);
        echo "</td>
                <td>";
        // line 80
        echo \Piwik\piwik_escape_filter($this->env, ($context["browser_version"] ?? $this->getContext($context, "browser_version")), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td>";
        // line 83
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_BrowserFamily")), "html", null, true);
        echo " <small>(<a href=\"javascript:showList('browserfamilies');\">";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Mobile_ShowAll")), "html", null, true);
        echo "</a>)</small></td>
                <td><img height=\"16px\" width=\"16px\" src=\"";
        // line 84
        echo \Piwik\piwik_escape_filter($this->env, ($context["browser_family_logo"] ?? $this->getContext($context, "browser_family_logo")), "html", null, true);
        echo "\" />";
        echo \Piwik\piwik_escape_filter($this->env, ($context["browser_family"] ?? $this->getContext($context, "browser_family")), "html", null, true);
        echo "</td>
            </tr>
            </tbody>
        </table>

        <h3>";
        // line 89
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_Device")), "html", null, true);
        echo "</h3>
        <table class=\"detection\" piwik-content-table>
            <tbody>
            <tr>
                <td>";
        // line 93
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_dataTableLabelTypes")), "html", null, true);
        echo " <small>(<a href=\"javascript:showList('devicetypes');\">";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Mobile_ShowAll")), "html", null, true);
        echo "</a>)</small></td>
                <td><img height=\"16px\" width=\"16px\" src=\"";
        // line 94
        echo \Piwik\piwik_escape_filter($this->env, ($context["device_type_logo"] ?? $this->getContext($context, "device_type_logo")), "html", null, true);
        echo "\" />";
        echo \Piwik\piwik_escape_filter($this->env, ($context["device_type"] ?? $this->getContext($context, "device_type")), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td>";
        // line 97
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_dataTableLabelBrands")), "html", null, true);
        echo " <small>(<a href=\"javascript:showList('brands');\">";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Mobile_ShowAll")), "html", null, true);
        echo "</a>)</small></td>
                <td><img height=\"16px\" width=\"16px\" src=\"";
        // line 98
        echo \Piwik\piwik_escape_filter($this->env, ($context["device_brand_logo"] ?? $this->getContext($context, "device_brand_logo")), "html", null, true);
        echo "\" />";
        echo \Piwik\piwik_escape_filter($this->env, ($context["device_brand"] ?? $this->getContext($context, "device_brand")), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td>";
        // line 101
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_dataTableLabelModels")), "html", null, true);
        echo "</td>
                <td>";
        // line 102
        echo \Piwik\piwik_escape_filter($this->env, ($context["device_model"] ?? $this->getContext($context, "device_model")), "html", null, true);
        echo "</td>
            </tr></tbody>
        </table>

    </div>

    <div class=\"ui-confirm\" id=\"deviceDetectionItemList\">
        <div class=\"itemList\"> </div>
        <input role=\"close\" type=\"button\" value=\"";
        // line 110
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Close")), "html", null, true);
        echo "\"/>
    </div>

";
    }

    public function getTemplateName()
    {
        return "@DevicesDetection/detection.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  244 => 110,  233 => 102,  229 => 101,  221 => 98,  215 => 97,  207 => 94,  201 => 93,  194 => 89,  184 => 84,  178 => 83,  172 => 80,  168 => 79,  160 => 76,  154 => 75,  147 => 71,  137 => 66,  131 => 65,  125 => 62,  121 => 61,  113 => 58,  107 => 57,  100 => 53,  94 => 50,  89 => 48,  85 => 47,  80 => 45,  76 => 44,  36 => 6,  33 => 5,  29 => 1,  25 => 3,  11 => 1,);
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

{% set title %}{{ 'DevicesDetection_DeviceDetection'|translate }}{% endset %}

{% block content %}

    <script type=\"text/javascript\">

        function showList(type) {
            var ajaxHandler = new ajaxHelper();
            ajaxHandler.addParams({
                module: 'DevicesDetection',
                action: 'showList',
                type: type
            }, 'GET');
            ajaxHandler.setFormat('html');
            ajaxHandler.setCallback(function(response){
                var \$list = \$('#deviceDetectionItemList');
                \$list.find('.itemList').html(response);
                piwikHelper.modalConfirm(\$list, [], {fixedFooter: true});
            });
            ajaxHandler.send();
        }

    </script>

    <style type=\"text/css\">
        textarea {
            width: 700px;
            display: block;
        }

        .detection {
            padding-top:10px;
        }
        .detection td {
            width: 50%;
        }
        .detection td img {
            margin-right: 10px;
        }
    </style>

    <div piwik-content-block content-title=\"{{ title|e('html_attr') }}\">
        <h3>{{ 'DevicesDetection_UserAgent'|translate|e('html_attr') }}</h3>

        <form action=\"{{ linkTo({}) }}\" method=\"POST\">
            <textarea name=\"ua\">{{ userAgent }}</textarea>
            <br />
            <input type=\"submit\" value=\"{{ 'General_Refresh'|translate }}\" />
        </form>

        <h3>{{ 'DevicesDetection_ColumnOperatingSystem'|translate|e('html_attr') }}</h3>
        <table class=\"detection\" piwik-content-table>
            <tbody>
            <tr>
                <td>{{ 'General_Name'|translate }} <small>(<a href=\"javascript:showList('os');\">{{ 'Mobile_ShowAll'|translate }}</a>)</small></td>
                <td><img height=\"16px\" width=\"16px\" src=\"{{ os_logo }}\" />{{ os_name }}</td>
            </tr>
            <tr>
                <td>{{ 'CorePluginsAdmin_Version'|translate }}</td>
                <td>{{ os_version }}</td>
            </tr>
            <tr>
                <td>{{ 'DevicesDetection_OperatingSystemFamily'|translate }}  <small>(<a href=\"javascript:showList('osfamilies');\">{{ 'Mobile_ShowAll'|translate }}</a>)</small></td>
                <td><img height=\"16px\" width=\"16px\" src=\"{{ os_family_logo }}\" />{{ os_family }}</td>
            </tr>
            </tbody>
        </table>

        <h3>{{ 'DevicesDetection_ColumnBrowser'|translate }}</h3>
        <table class=\"detection\" piwik-content-table>
            <tbody>
            <tr>
                <td>{{ 'General_Name'|translate }} <small>(<a href=\"javascript:showList('browsers');\">{{ 'Mobile_ShowAll'|translate }}</a>)</small></td>
                <td><img height=\"16px\" width=\"16px\" src=\"{{ browser_logo }}\" />{{ browser_name }}</td>
            </tr>
            <tr>
                <td>{{ 'CorePluginsAdmin_Version'|translate }}</td>
                <td>{{ browser_version }}</td>
            </tr>
            <tr>
                <td>{{ 'DevicesDetection_BrowserFamily'|translate }} <small>(<a href=\"javascript:showList('browserfamilies');\">{{ 'Mobile_ShowAll'|translate }}</a>)</small></td>
                <td><img height=\"16px\" width=\"16px\" src=\"{{ browser_family_logo }}\" />{{ browser_family }}</td>
            </tr>
            </tbody>
        </table>

        <h3>{{ 'DevicesDetection_Device'|translate }}</h3>
        <table class=\"detection\" piwik-content-table>
            <tbody>
            <tr>
                <td>{{ 'DevicesDetection_dataTableLabelTypes'|translate }} <small>(<a href=\"javascript:showList('devicetypes');\">{{ 'Mobile_ShowAll'|translate }}</a>)</small></td>
                <td><img height=\"16px\" width=\"16px\" src=\"{{ device_type_logo }}\" />{{ device_type }}</td>
            </tr>
            <tr>
                <td>{{ 'DevicesDetection_dataTableLabelBrands'|translate }} <small>(<a href=\"javascript:showList('brands');\">{{ 'Mobile_ShowAll'|translate }}</a>)</small></td>
                <td><img height=\"16px\" width=\"16px\" src=\"{{ device_brand_logo }}\" />{{ device_brand }}</td>
            </tr>
            <tr>
                <td>{{ 'DevicesDetection_dataTableLabelModels'|translate }}</td>
                <td>{{ device_model }}</td>
            </tr></tbody>
        </table>

    </div>

    <div class=\"ui-confirm\" id=\"deviceDetectionItemList\">
        <div class=\"itemList\"> </div>
        <input role=\"close\" type=\"button\" value=\"{{ 'General_Close'|translate }}\"/>
    </div>

{% endblock %}
", "@DevicesDetection/detection.twig", "/var/www/html/analytics/plugins/DevicesDetection/templates/detection.twig");
    }
}
