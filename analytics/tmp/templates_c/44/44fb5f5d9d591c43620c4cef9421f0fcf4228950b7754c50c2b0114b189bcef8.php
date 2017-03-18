<?php

/* @CoreHome/_dataTableActions.twig */
class __TwigTemplate_d4b11fd7b49140838c0ff04cba00452a11df259927c8323c82be93e971c777cd extends Twig_Template
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
        echo " ";
        $context["randomIdForDropdown"] = twig_random($this->env, 999999);
        // line 2
        echo "
    ";
        // line 3
        if (($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_footer", array()) && $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_footer_icons", array()))) {
            // line 4
            echo "
        <a class='dropdown-button dropdownConfigureIcon dataTableAction'
           href='javascript:;'
           data-activates='dropdownConfigure";
            // line 7
            echo \Piwik\piwik_escape_filter($this->env, ($context["randomIdForDropdown"] ?? $this->getContext($context, "randomIdForDropdown")), "html", null, true);
            echo "'><span class=\"icon-configure\"></span></a>

        ";
            // line 9
            $context["activeFooterIcon"] = "";
            // line 10
            echo "        ";
            $context["numIcons"] = 0;
            // line 11
            echo "        ";
            ob_start();
            // line 12
            echo "            <ul id='dropdownVisualizations";
            echo \Piwik\piwik_escape_filter($this->env, ($context["randomIdForDropdown"] ?? $this->getContext($context, "randomIdForDropdown")), "html", null, true);
            echo "' class='dropdown-content dataTableFooterIcons'>
                ";
            // line 13
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["footerIcons"] ?? $this->getContext($context, "footerIcons")));
            foreach ($context['_seq'] as $context["_key"] => $context["footerIconGroup"]) {
                // line 14
                echo "                    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["footerIconGroup"], "buttons", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["footerIcon"]) {
                    if ($this->getAttribute($context["footerIcon"], "icon", array())) {
                        // line 15
                        echo "                        <li>
                            ";
                        // line 16
                        $context["numIcons"] = (($context["numIcons"] ?? $this->getContext($context, "numIcons")) + 1);
                        // line 17
                        echo "                            ";
                        $context["isActiveEcommerceView"] = ($this->getAttribute(($context["clientSideParameters"] ?? null), "abandonedCarts", array(), "any", true, true) && ((($this->getAttribute(                        // line 18
$context["footerIcon"], "id", array()) == "ecommerceOrder") && ($this->getAttribute(($context["clientSideParameters"] ?? $this->getContext($context, "clientSideParameters")), "abandonedCarts", array()) == 0)) || (($this->getAttribute(                        // line 19
$context["footerIcon"], "id", array()) == "ecommerceAbandonedCart") && ($this->getAttribute(($context["clientSideParameters"] ?? $this->getContext($context, "clientSideParameters")), "abandonedCarts", array()) == 1))));
                        // line 20
                        echo "                            <a class=\"";
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["footerIconGroup"], "class", array()), "html", null, true);
                        echo " tableIcon ";
                        if ((($this->getAttribute(($context["clientSideParameters"] ?? $this->getContext($context, "clientSideParameters")), "viewDataTable", array()) == $this->getAttribute($context["footerIcon"], "id", array())) || ($context["isActiveEcommerceView"] ?? $this->getContext($context, "isActiveEcommerceView")))) {
                            echo "activeIcon";
                            $context["activeFooterIcon"] = $this->getAttribute($context["footerIcon"], "icon", array());
                        }
                        echo "\"
                               data-footer-icon-id=\"";
                        // line 21
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["footerIcon"], "id", array()), "html", null, true);
                        echo "\">
                                ";
                        // line 22
                        if ((is_string($__internal_47430c1036013a931cda0b45ec685b334b15b42c3cd0eb6e8b6c9e260b5a9654 = $this->getAttribute($context["footerIcon"], "icon", array())) && is_string($__internal_3fbc087ffd790b438268b7b45b342226223bb43c3cea56912e0104a4d64df73d = "icon-") && ('' === $__internal_3fbc087ffd790b438268b7b45b342226223bb43c3cea56912e0104a4d64df73d || 0 === strpos($__internal_47430c1036013a931cda0b45ec685b334b15b42c3cd0eb6e8b6c9e260b5a9654, $__internal_3fbc087ffd790b438268b7b45b342226223bb43c3cea56912e0104a4d64df73d)))) {
                            // line 23
                            echo "                                    <span title=\"";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["footerIcon"], "title", array()), "html", null, true);
                            echo "\" class=\"";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["footerIcon"], "icon", array()), "html", null, true);
                            echo "\"></span>
                                ";
                        } else {
                            // line 25
                            echo "                                    <img width=\"16\" height=\"16\" title=\"";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["footerIcon"], "title", array()), "html", null, true);
                            echo "\" src=\"";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["footerIcon"], "icon", array()), "html", null, true);
                            echo "\"/>
                                ";
                        }
                        // line 27
                        echo "                                ";
                        if ($this->getAttribute($context["footerIcon"], "title", array(), "any", true, true)) {
                            echo "<span>";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["footerIcon"], "title", array()), "html", null, true);
                            echo "</span>";
                        }
                        // line 28
                        echo "                            </a>
                        </li>
                    ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['footerIcon'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 31
                echo "                    <li class=\"divider\"></li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['footerIconGroup'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "            </ul>
        ";
            $context["visualizationIcons"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 35
            echo "
        ";
            // line 36
            if ((($context["activeFooterIcon"] ?? $this->getContext($context, "activeFooterIcon")) && (($context["numIcons"] ?? $this->getContext($context, "numIcons")) > 1))) {
                // line 37
                echo "            <a class=\"dropdown-button dataTableAction activateVisualizationSelection\"
               href=\"javascript:;\"
               data-activates=\"dropdownVisualizations";
                // line 39
                echo \Piwik\piwik_escape_filter($this->env, ($context["randomIdForDropdown"] ?? $this->getContext($context, "randomIdForDropdown")), "html", null, true);
                echo "\">
                ";
                // line 40
                if ((is_string($__internal_7e4f89f51c09c332b484ea23576b607666845491c59ae75fea6a768eb6d60cf3 = ($context["activeFooterIcon"] ?? $this->getContext($context, "activeFooterIcon"))) && is_string($__internal_4ad5599a500596dce58c36c84caffe757d274e661da79ad2883193d9624918a2 = "icon-") && ('' === $__internal_4ad5599a500596dce58c36c84caffe757d274e661da79ad2883193d9624918a2 || 0 === strpos($__internal_7e4f89f51c09c332b484ea23576b607666845491c59ae75fea6a768eb6d60cf3, $__internal_4ad5599a500596dce58c36c84caffe757d274e661da79ad2883193d9624918a2)))) {
                    // line 41
                    echo "                    <span title=\"";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_ChangeVisualization")), "html_attr");
                    echo "\" class=\"";
                    echo \Piwik\piwik_escape_filter($this->env, ($context["activeFooterIcon"] ?? $this->getContext($context, "activeFooterIcon")), "html", null, true);
                    echo "\"></span>
                ";
                } else {
                    // line 43
                    echo "                    <img title=\"";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_ChangeVisualization")), "html_attr");
                    echo "\" width=\"16\" height=\"16\" src=\"";
                    echo \Piwik\piwik_escape_filter($this->env, ($context["activeFooterIcon"] ?? $this->getContext($context, "activeFooterIcon")), "html", null, true);
                    echo "\"/>
                ";
                }
                // line 45
                echo "            </a>
            ";
                // line 46
                echo ($context["visualizationIcons"] ?? $this->getContext($context, "visualizationIcons"));
                echo "
        ";
            }
            // line 48
            echo "
        <a class='dropdown-button dataTableAction activateExportSelection'
           href='javascript:;' title=\"";
            // line 50
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ExportThisReport")), "html_attr");
            echo "\"
           data-activates='dropdownExport";
            // line 51
            echo \Piwik\piwik_escape_filter($this->env, ($context["randomIdForDropdown"] ?? $this->getContext($context, "randomIdForDropdown")), "html", null, true);
            echo "'><span class=\"icon-export\"></span></a>

        ";
            // line 53
            if ((call_user_func_array($this->env->getFunction('isPluginLoaded')->getCallable(), array("Annotations")) &&  !$this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "hide_annotations_view", array()))) {
                // line 54
                echo "            <a class='dataTableAction annotationView'
               href='javascript:;' title=\"";
                // line 55
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Annotations_Annotations")), "html_attr");
                echo "\"
            ><span class=\"icon-annotation\"></span></a>
        ";
            }
            // line 58
            echo "
        ";
            // line 59
            if ($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_search", array())) {
                // line 60
                echo "            <a class='dropdown-button dataTableAction searchAction'
               href='javascript:;' title=\"";
                // line 61
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Search")), "html_attr");
                echo "\"
               ><span class=\"icon-search\"></span>
                <span class=\"icon-close\" title=\"";
                // line 63
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_CloseSearch")), "html_attr");
                echo "\"></span>
                <input id=\"widgetSearch_";
                // line 64
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "report_id", array()), "html", null, true);
                echo "\"
                       title=\"";
                // line 65
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_DataTableHowToSearch")), "html_attr");
                echo "\"
                       type=\"text\"
                       class=\"dataTableSearchInput browser-default\" />
            </a>
        ";
            }
            // line 70
            echo "
        <ul id='dropdownExport";
            // line 71
            echo \Piwik\piwik_escape_filter($this->env, ($context["randomIdForDropdown"] ?? $this->getContext($context, "randomIdForDropdown")), "html", null, true);
            echo "' class='dropdown-content exportToFormatItems'>
            ";
            // line 72
            $context["requestParams"] = twig_jsonencode_filter($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "request_parameters_to_modify", array()));
            // line 73
            echo "            <li><a target=\"_blank\" requestParams=\"";
            echo \Piwik\piwik_escape_filter($this->env, ($context["requestParams"] ?? $this->getContext($context, "requestParams")), "html_attr");
            echo "\" methodToCall=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "apiMethodToRequestDataTable", array()), "html", null, true);
            echo "\" format=\"CSV\" filter_limit=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "export_limit", array()), "html", null, true);
            echo "\">CSV</a></li>
            <li><a target=\"_blank\" requestParams=\"";
            // line 74
            echo \Piwik\piwik_escape_filter($this->env, ($context["requestParams"] ?? $this->getContext($context, "requestParams")), "html_attr");
            echo "\" methodToCall=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "apiMethodToRequestDataTable", array()), "html", null, true);
            echo "\" format=\"TSV\" filter_limit=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "export_limit", array()), "html", null, true);
            echo "\">TSV (Excel)</a></li>
            <li><a target=\"_blank\" requestParams=\"";
            // line 75
            echo \Piwik\piwik_escape_filter($this->env, ($context["requestParams"] ?? $this->getContext($context, "requestParams")), "html_attr");
            echo "\" methodToCall=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "apiMethodToRequestDataTable", array()), "html", null, true);
            echo "\" format=\"XML\" filter_limit=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "export_limit", array()), "html", null, true);
            echo "\">XML</a></li>
            <li><a target=\"_blank\" requestParams=\"";
            // line 76
            echo \Piwik\piwik_escape_filter($this->env, ($context["requestParams"] ?? $this->getContext($context, "requestParams")), "html_attr");
            echo "\" methodToCall=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "apiMethodToRequestDataTable", array()), "html", null, true);
            echo "\" format=\"JSON\" filter_limit=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "export_limit", array()), "html", null, true);
            echo "\">Json</a></li>
            <li><a target=\"_blank\" requestParams=\"";
            // line 77
            echo \Piwik\piwik_escape_filter($this->env, ($context["requestParams"] ?? $this->getContext($context, "requestParams")), "html_attr");
            echo "\" methodToCall=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "apiMethodToRequestDataTable", array()), "html", null, true);
            echo "\" format=\"PHP\" filter_limit=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "export_limit", array()), "html", null, true);
            echo "\">Php</a></li>
            ";
            // line 78
            if ($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_export_as_rss_feed", array())) {
                // line 79
                echo "                <li><a target=\"_blank\" requestParams=\"";
                echo \Piwik\piwik_escape_filter($this->env, ($context["requestParams"] ?? $this->getContext($context, "requestParams")), "html_attr");
                echo "\" methodToCall=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "apiMethodToRequestDataTable", array()), "html", null, true);
                echo "\" format=\"RSS\" filter_limit=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "export_limit", array()), "html", null, true);
                echo "\" date=\"last10\">
                        <span class=\"icon-feed\"></span> RSS
                    </a>
                </li>
            ";
            }
            // line 84
            echo "            ";
            if ($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_export_as_image_icon", array())) {
                // line 85
                echo "                <li><a class=\"tableIcon\" href=\"javascript:;\" id=\"dataTableFooterExportAsImageIcon\" onclick=\"\$(this).closest('.dataTable').find('div.jqplot-target').trigger('piwikExportAsImage'); return false;\">
                        <span class=\"icon-image\"></span>
                        ";
                // line 87
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ExportAsImage")), "html", null, true);
                echo "
                    </a>
                </li>
            ";
            }
            // line 91
            echo "        </ul>
        <ul id='dropdownConfigure";
            // line 92
            echo \Piwik\piwik_escape_filter($this->env, ($context["randomIdForDropdown"] ?? $this->getContext($context, "randomIdForDropdown")), "html", null, true);
            echo "' class='dropdown-content tableConfiguration'>
            ";
            // line 93
            if ($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_flatten_table", array())) {
                // line 94
                echo "                ";
                if (($this->getAttribute(($context["clientSideParameters"] ?? null), "flat", array(), "any", true, true) && ($this->getAttribute(($context["clientSideParameters"] ?? $this->getContext($context, "clientSideParameters")), "flat", array()) == 1))) {
                    // line 95
                    echo "                    <li>
                        <div class=\"configItem dataTableIncludeAggregateRows\"></div>
                    </li>
                ";
                }
                // line 99
                echo "                <li>
                    <div class=\"configItem dataTableFlatten\"></div>
                </li>
            ";
            }
            // line 103
            echo "            ";
            if ($this->getAttribute(($context["properties"] ?? $this->getContext($context, "properties")), "show_exclude_low_population", array())) {
                // line 104
                echo "                <li>
                    <div class=\"configItem dataTableExcludeLowPopulation\"></div>
                </li>
            ";
            }
            // line 108
            echo "            ";
            if ( !twig_test_empty((($this->getAttribute(($context["properties"] ?? null), "show_pivot_by_subtable", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["properties"] ?? null), "show_pivot_by_subtable", array()))) : ("")))) {
                // line 109
                echo "                <li>
                    <div class=\"configItem dataTablePivotBySubtable\"></div>
                </li>
            ";
            }
            // line 113
            echo "        </ul>
    ";
        }
    }

    public function getTemplateName()
    {
        return "@CoreHome/_dataTableActions.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  342 => 113,  336 => 109,  333 => 108,  327 => 104,  324 => 103,  318 => 99,  312 => 95,  309 => 94,  307 => 93,  303 => 92,  300 => 91,  293 => 87,  289 => 85,  286 => 84,  273 => 79,  271 => 78,  263 => 77,  255 => 76,  247 => 75,  239 => 74,  230 => 73,  228 => 72,  224 => 71,  221 => 70,  213 => 65,  209 => 64,  205 => 63,  200 => 61,  197 => 60,  195 => 59,  192 => 58,  186 => 55,  183 => 54,  181 => 53,  176 => 51,  172 => 50,  168 => 48,  163 => 46,  160 => 45,  152 => 43,  144 => 41,  142 => 40,  138 => 39,  134 => 37,  132 => 36,  129 => 35,  125 => 33,  118 => 31,  109 => 28,  102 => 27,  94 => 25,  86 => 23,  84 => 22,  80 => 21,  70 => 20,  68 => 19,  67 => 18,  65 => 17,  63 => 16,  60 => 15,  54 => 14,  50 => 13,  45 => 12,  42 => 11,  39 => 10,  37 => 9,  32 => 7,  27 => 4,  25 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source(" {% set randomIdForDropdown = random(999999) %}

    {% if properties.show_footer and properties.show_footer_icons %}

        <a class='dropdown-button dropdownConfigureIcon dataTableAction'
           href='javascript:;'
           data-activates='dropdownConfigure{{ randomIdForDropdown }}'><span class=\"icon-configure\"></span></a>

        {% set activeFooterIcon = '' %}
        {% set numIcons = 0 %}
        {% set visualizationIcons %}
            <ul id='dropdownVisualizations{{ randomIdForDropdown }}' class='dropdown-content dataTableFooterIcons'>
                {% for footerIconGroup in footerIcons %}
                    {% for footerIcon in footerIconGroup.buttons if footerIcon.icon %}
                        <li>
                            {% set numIcons = numIcons + 1 %}
                            {% set isActiveEcommerceView = clientSideParameters.abandonedCarts is defined and
                            ((footerIcon.id == 'ecommerceOrder' and clientSideParameters.abandonedCarts == 0) or
                            (footerIcon.id == 'ecommerceAbandonedCart' and clientSideParameters.abandonedCarts == 1)) %}
                            <a class=\"{{ footerIconGroup.class }} tableIcon {% if clientSideParameters.viewDataTable == footerIcon.id or isActiveEcommerceView %}activeIcon{% set activeFooterIcon = footerIcon.icon %}{% endif %}\"
                               data-footer-icon-id=\"{{ footerIcon.id }}\">
                                {% if footerIcon.icon starts with 'icon-' %}
                                    <span title=\"{{ footerIcon.title }}\" class=\"{{ footerIcon.icon }}\"></span>
                                {% else %}
                                    <img width=\"16\" height=\"16\" title=\"{{ footerIcon.title }}\" src=\"{{ footerIcon.icon }}\"/>
                                {% endif %}
                                {% if footerIcon.title is defined %}<span>{{ footerIcon.title }}</span>{% endif %}
                            </a>
                        </li>
                    {% endfor %}
                    <li class=\"divider\"></li>
                {% endfor %}
            </ul>
        {% endset %}

        {% if activeFooterIcon and numIcons > 1 %}
            <a class=\"dropdown-button dataTableAction activateVisualizationSelection\"
               href=\"javascript:;\"
               data-activates=\"dropdownVisualizations{{ randomIdForDropdown }}\">
                {% if activeFooterIcon starts with 'icon-' %}
                    <span title=\"{{ 'CoreHome_ChangeVisualization'|translate|e('html_attr') }}\" class=\"{{ activeFooterIcon }}\"></span>
                {% else %}
                    <img title=\"{{ 'CoreHome_ChangeVisualization'|translate|e('html_attr') }}\" width=\"16\" height=\"16\" src=\"{{ activeFooterIcon }}\"/>
                {% endif %}
            </a>
            {{ visualizationIcons|raw }}
        {% endif %}

        <a class='dropdown-button dataTableAction activateExportSelection'
           href='javascript:;' title=\"{{ 'General_ExportThisReport'|translate|e('html_attr') }}\"
           data-activates='dropdownExport{{ randomIdForDropdown }}'><span class=\"icon-export\"></span></a>

        {% if isPluginLoaded('Annotations') and not properties.hide_annotations_view %}
            <a class='dataTableAction annotationView'
               href='javascript:;' title=\"{{ 'Annotations_Annotations'|translate|e('html_attr') }}\"
            ><span class=\"icon-annotation\"></span></a>
        {% endif %}

        {% if properties.show_search %}
            <a class='dropdown-button dataTableAction searchAction'
               href='javascript:;' title=\"{{ 'General_Search'|translate|e('html_attr') }}\"
               ><span class=\"icon-search\"></span>
                <span class=\"icon-close\" title=\"{{ 'CoreHome_CloseSearch'|translate|e('html_attr') }}\"></span>
                <input id=\"widgetSearch_{{ properties.report_id }}\"
                       title=\"{{ 'CoreHome_DataTableHowToSearch'|translate|e('html_attr') }}\"
                       type=\"text\"
                       class=\"dataTableSearchInput browser-default\" />
            </a>
        {% endif %}

        <ul id='dropdownExport{{ randomIdForDropdown }}' class='dropdown-content exportToFormatItems'>
            {% set requestParams = properties.request_parameters_to_modify|json_encode %}
            <li><a target=\"_blank\" requestParams=\"{{ requestParams|e('html_attr') }}\" methodToCall=\"{{ properties.apiMethodToRequestDataTable }}\" format=\"CSV\" filter_limit=\"{{ properties.export_limit }}\">CSV</a></li>
            <li><a target=\"_blank\" requestParams=\"{{ requestParams|e('html_attr') }}\" methodToCall=\"{{ properties.apiMethodToRequestDataTable }}\" format=\"TSV\" filter_limit=\"{{ properties.export_limit }}\">TSV (Excel)</a></li>
            <li><a target=\"_blank\" requestParams=\"{{ requestParams|e('html_attr') }}\" methodToCall=\"{{ properties.apiMethodToRequestDataTable }}\" format=\"XML\" filter_limit=\"{{ properties.export_limit }}\">XML</a></li>
            <li><a target=\"_blank\" requestParams=\"{{ requestParams|e('html_attr') }}\" methodToCall=\"{{ properties.apiMethodToRequestDataTable }}\" format=\"JSON\" filter_limit=\"{{ properties.export_limit }}\">Json</a></li>
            <li><a target=\"_blank\" requestParams=\"{{ requestParams|e('html_attr') }}\" methodToCall=\"{{ properties.apiMethodToRequestDataTable }}\" format=\"PHP\" filter_limit=\"{{ properties.export_limit }}\">Php</a></li>
            {% if properties.show_export_as_rss_feed %}
                <li><a target=\"_blank\" requestParams=\"{{ requestParams|e('html_attr') }}\" methodToCall=\"{{ properties.apiMethodToRequestDataTable }}\" format=\"RSS\" filter_limit=\"{{ properties.export_limit }}\" date=\"last10\">
                        <span class=\"icon-feed\"></span> RSS
                    </a>
                </li>
            {% endif %}
            {% if properties.show_export_as_image_icon %}
                <li><a class=\"tableIcon\" href=\"javascript:;\" id=\"dataTableFooterExportAsImageIcon\" onclick=\"\$(this).closest('.dataTable').find('div.jqplot-target').trigger('piwikExportAsImage'); return false;\">
                        <span class=\"icon-image\"></span>
                        {{ 'General_ExportAsImage'|translate }}
                    </a>
                </li>
            {% endif %}
        </ul>
        <ul id='dropdownConfigure{{ randomIdForDropdown }}' class='dropdown-content tableConfiguration'>
            {% if properties.show_flatten_table %}
                {% if clientSideParameters.flat is defined and clientSideParameters.flat == 1 %}
                    <li>
                        <div class=\"configItem dataTableIncludeAggregateRows\"></div>
                    </li>
                {% endif %}
                <li>
                    <div class=\"configItem dataTableFlatten\"></div>
                </li>
            {% endif %}
            {% if properties.show_exclude_low_population %}
                <li>
                    <div class=\"configItem dataTableExcludeLowPopulation\"></div>
                </li>
            {% endif %}
            {% if properties.show_pivot_by_subtable|default is not empty %}
                <li>
                    <div class=\"configItem dataTablePivotBySubtable\"></div>
                </li>
            {% endif %}
        </ul>
    {% endif %}", "@CoreHome/_dataTableActions.twig", "/var/www/html/analytics/plugins/CoreHome/templates/_dataTableActions.twig");
    }
}
