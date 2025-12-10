/**
 * Featured Galleries Block for WordPress Block Editor
 */

(function(blocks, element, editor, components, i18n) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var InspectorControls = editor.InspectorControls;
    var PanelBody = components.PanelBody;
    var TextControl = components.TextControl;
    var SelectControl = components.SelectControl;
    var RangeControl = components.RangeControl;
    var ToggleControl = components.ToggleControl;
    var __ = i18n.__;

    registerBlockType('andykemp/featured-galleries', {
        title: __('Featured Galleries'),
        description: __('Display your latest gallery pages with featured images.'),
        icon: 'format-gallery',
        category: 'widgets',
        attributes: {
            title: {
                type: 'string',
                default: 'Latest Galleries'
            },
            subtitle: {
                type: 'string',
                default: 'Discover my most recent photographic work'
            },
            numberOfGalleries: {
                type: 'number',
                default: 3
            },
            parentPage: {
                type: 'number',
                default: 0
            },
            showButton: {
                type: 'boolean',
                default: true
            },
            buttonText: {
                type: 'string',
                default: 'View All Galleries'
            },
            buttonUrl: {
                type: 'string',
                default: '/galleries/'
            }
        },

        edit: function(props) {
            var attributes = props.attributes;
            var setAttributes = props.setAttributes;

            function onChangeTitle(newTitle) {
                setAttributes({ title: newTitle });
            }

            function onChangeSubtitle(newSubtitle) {
                setAttributes({ subtitle: newSubtitle });
            }

            function onChangeNumberOfGalleries(newNumber) {
                setAttributes({ numberOfGalleries: newNumber });
            }

            function onChangeParentPage(newParent) {
                setAttributes({ parentPage: parseInt(newParent) });
            }

            function onChangeShowButton(newValue) {
                setAttributes({ showButton: newValue });
            }

            function onChangeButtonText(newText) {
                setAttributes({ buttonText: newText });
            }

            function onChangeButtonUrl(newUrl) {
                setAttributes({ buttonUrl: newUrl });
            }

            return [
                // Inspector Controls (Settings Panel)
                el(InspectorControls, {},
                    el(PanelBody, { title: __('Gallery Settings'), initialOpen: true },
                        el(TextControl, {
                            label: __('Title'),
                            value: attributes.title,
                            onChange: onChangeTitle
                        }),
                        el(TextControl, {
                            label: __('Subtitle'),
                            value: attributes.subtitle,
                            onChange: onChangeSubtitle
                        }),
                        el(SelectControl, {
                            label: __('Parent Page'),
                            value: attributes.parentPage,
                            options: window.featuredGalleriesData ? window.featuredGalleriesData.pages : [
                                { value: 0, label: 'All pages (auto-detect galleries)' }
                            ],
                            onChange: onChangeParentPage,
                            help: __('Select a parent page to show only its child pages (e.g., select "Galleries" to show only gallery child pages)')
                        }),
                        el(RangeControl, {
                            label: __('Number of Galleries'),
                            value: attributes.numberOfGalleries,
                            onChange: onChangeNumberOfGalleries,
                            min: 1,
                            max: 6
                        })
                    ),
                    el(PanelBody, { title: __('Button Settings'), initialOpen: false },
                        el(ToggleControl, {
                            label: __('Show "View All" Button'),
                            checked: attributes.showButton,
                            onChange: onChangeShowButton
                        }),
                        attributes.showButton && el(TextControl, {
                            label: __('Button Text'),
                            value: attributes.buttonText,
                            onChange: onChangeButtonText
                        }),
                        attributes.showButton && el(TextControl, {
                            label: __('Button URL'),
                            value: attributes.buttonUrl,
                            onChange: onChangeButtonUrl,
                            help: __('URL for the "View All" button (e.g., /galleries/)')
                        })
                    )
                ),

                // Block Preview in Editor
                el('div', { className: 'featured-galleries-block-preview' },
                    el('div', { 
                        style: {
                            border: '2px dashed #ccc',
                            borderRadius: '8px',
                            padding: '40px 20px',
                            textAlign: 'center',
                            backgroundColor: '#f9f9f9',
                            margin: '20px 0'
                        }
                    },
                        el('div', {
                            style: {
                                display: 'inline-block',
                                padding: '12px 24px',
                                backgroundColor: '#0073aa',
                                color: 'white',
                                borderRadius: '4px',
                                marginBottom: '16px'
                            }
                        }, '📷'),
                        el('h3', {
                            style: {
                                margin: '16px 0 8px',
                                color: '#333',
                                fontSize: '18px'
                            }
                        }, attributes.title || 'Featured Galleries'),
                        el('p', {
                            style: {
                                margin: '8px 0 16px',
                                color: '#666',
                                fontSize: '14px'
                            }
                        }, attributes.subtitle || 'Discover my most recent photographic work'),
                        el('p', {
                            style: {
                                color: '#999',
                                fontSize: '12px',
                                marginBottom: '16px'
                            }
                        }, `Showing ${attributes.numberOfGalleries} ${attributes.parentPage > 0 ? 'child galleries' : 'latest galleries'}`),
                        el('div', {
                            style: {
                                display: 'flex',
                                justifyContent: 'center',
                                gap: '12px',
                                flexWrap: 'wrap'
                            }
                        },
                            Array.from({length: Math.min(attributes.numberOfGalleries, 3)}, (_, i) =>
                                el('div', {
                                    key: i,
                                    style: {
                                        width: '120px',
                                        height: '90px',
                                        backgroundColor: '#ddd',
                                        borderRadius: '4px',
                                        display: 'flex',
                                        alignItems: 'center',
                                        justifyContent: 'center',
                                        color: '#999',
                                        fontSize: '12px'
                                    }
                                }, `Gallery ${i + 1}`)
                            )
                        ),
                        attributes.showButton && el('div', {
                            style: {
                                marginTop: '16px'
                            }
                        },
                            el('button', {
                                style: {
                                    padding: '8px 16px',
                                    backgroundColor: '#0073aa',
                                    color: 'white',
                                    border: 'none',
                                    borderRadius: '4px',
                                    fontSize: '12px',
                                    cursor: 'pointer'
                                }
                            }, attributes.buttonText || 'View All Galleries')
                        )
                    )
                )
            ];
        },

        save: function() {
            // Return null since this is a dynamic block rendered by PHP
            return null;
        }
    });

})(
    window.wp.blocks,
    window.wp.element,
    window.wp.editor || window.wp.blockEditor,
    window.wp.components,
    window.wp.i18n
);