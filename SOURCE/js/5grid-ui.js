/* 5grid-ui.js v0.2 | (c) n33 | n33.co @n33co | MIT + GPLv2 */
_5grid.registerPlugin("ui", {
        config: {
            baseZIndex: 1E4,
            speed: 250,
            panels: {},
            bars: {}
        },
        cache: {
            panels: {},
            bars: {},
            body: null,
            window: null,
            pageWrapper: null,
            defaultWrapper: null,
            fixedWrapper: null,
            activePanel: null
        },
        deviceType: null,
        eventType: "click",
        isTouch: !1,
        presets: {
            legacy: {
                panels: {
                    navPanel: {
                        breakpoints: "mobile",
                        position: "left",
                        style: "push",
                        size: "80%",
                        html: '<div data-action="navList" data-target="nav"></div>'
                    }
                },
                bars: {
                    titleBar: {
                        breakpoints: "mobile",
                        position: "top",
                        size: 44,
                        style: "floating",
                        html: '<span class="toggle" data-action="panelToggle" data-target="navPanel"></span><span class="title" data-action="copyHTML" data-target="logo"></span>'
                    }
                }
            }
        },
        defaults: {
            config: {
                panel: {
                    breakpoints: null,
                    position: null,
                    style: null,
                    size: "80%",
                    html: "",
                    resetScroll: !0,
                    resetForms: !0,
                    swipeToClose: !0
                },
                bar: {
                    breakpoints: null,
                    position: null,
                    style: null,
                    size: 44,
                    style: "floating",
                    html: ""
                }
            }
        },
        parseSuspend: function (a) {
            a = a.get(0);
            a.suspend_5grid && a.suspend_5grid()
        },
        parseResume: function (a) {
            a = a.get(0);
            a.resume_5grid && a.resume_5grid()
        },
        parseInit: function (a) {
            var b = this,
                c, d;
            c = a.get(0);
            var f = a.attr("data-action"),
                e = a.attr("data-target") ? jQuery("#" + a.attr("data-target")) : null,
                g = 1 == a.attr("data-target-hide");
            switch (f) {
            case "panelToggle":
                a.css("-webkit-tap-highlight-color", "rgba(0,0,0,0)").css("cursor", "pointer");
                c = function (a) {
                    a.preventDefault();
                    a.stopPropagation();
                    a = jQuery(this);
                    a = b.cache.panels[a.attr("data-target")];
                    a.is(":visible") ? a.close_5grid() : a.open_5grid()
                };
                "android" == b.deviceType ? a.bind("click", c) : a.bind(b.eventType, c);
                break;
            case "navList":
                c = e.find("a");
                d = [];
                c.each(function () {
                        var b = jQuery(this),
                            a;
                        a = Math.max(0, b.parents("li").length - 1);
                        d.push('<a class="link depth-' + a + '" href="' + b.attr("href") + '"><span class="indent-' + a + '"></span>' + b.text() + "</a>")
                    });
                0 < d.length && a.html("<nav>" + d.join("") + "</nav>");
                a.find(".link").css("cursor", "pointer").css("display", "block");
                break;
            case "copyText":
                a.html(e.text());
                break;
            case "copyHTML":
                a.html(e.html());
                break;
            case "moveHTML":
                c.resume_5grid = function () {
                    e.children().each(function () {
                            a.append(jQuery(this))
                        });
                    g && e.hide()
                };
                c.suspend_5grid = function () {
                    a.children().each(function () {
                            e.append(jQuery(this))
                        });
                    g && e.show()
                };
                c.resume_5grid();
                break;
            case "moveElement":
                c.resume_5grid = function () {
                    jQuery('<div id="5grid-ui-tmp-' + e.attr("id") + '" />').insertBefore(e);
                    a.append(e)
                }, c.suspend_5grid = function () {
                    jQuery("#5grid-ui-tmp-" + e.attr("id")).replaceWith(e)
                }, c.resume_5grid()
            }
        },
        lockView: function (a) {
            var b = this;
            b.cache.window.scrollPos_5grid = b.cache.window.scrollTop();
            b.cache.body.css("overflow-" + a, "hidden");
            b.cache.pageWrapper.bind("touchstart.lock", function (a) {
                    a.preventDefault();
                    a.stopPropagation();
                    b.cache.activePanel && b.cache.activePanel.close_5grid()
                });
            b.cache.pageWrapper.bind("click.lock", function (a) {
                    a.preventDefault();
                    a.stopPropagation();
                    b.cache.activePanel && b.cache.activePanel.close_5grid()
                });
            b.cache.pageWrapper.bind("scroll.lock", function (a) {
                    a.preventDefault();
                    a.stopPropagation();
                    b.cache.activePanel && b.cache.activePanel.close_5grid()
                });
            b.cache.window.bind("orientationchange.lock", function (a) {
                    b.cache.activePanel && b.cache.activePanel.close_5grid()
                });
            b.isTouch || (b.cache.window.bind("resize.lock", function (a) {
                        b.cache.activePanel && b.cache.activePanel.close_5grid()
                    }), b.cache.window.bind("scroll.lock", function (a) {
                        b.cache.activePanel && b.cache.activePanel.close_5grid()
                    }))
        },
        unlockView: function (a) {
            this.cache.body.css("overflow-" + a, "visible");
            this.cache.pageWrapper.unbind("touchstart.lock");
            this.cache.pageWrapper.unbind("click.lock");
            this.cache.pageWrapper.unbind("scroll.lock");
            this.cache.window.unbind("orientationchange.lock");
            this.isTouch || (this.cache.window.unbind("resize.lock"), this.cache.window.unbind("scroll.lock"))
        },
        resumeComponent: function (a) {
            var b = this;
            b.cache[a.type + "s"][a.id].find("*").each(function () {
                    b.parseResume(jQuery(this))
                })
        },
        suspendComponent: function (a) {
            var b = this;
            a = b.cache[a.type + "s"][a.id];
            a.css("transform", "translate(0,0)");
            a.find("*").each(function () {
                    b.parseSuspend(jQuery(this))
                })
        },
        initComponent: function (a) {
            var b = this,
                c = a.config,
                d = jQuery(a.object);
            b.cache[a.type + "s"][a.id] = d;
            d.applyTransition_5grid().accelerate_5grid();
            d.find("*").each(function () {
                    b.parseInit(jQuery(this))
                });
            switch (a.type) {
            case "panel":
                d.addClass("5grid-ui-panel").css("z-index", this.config.baseZIndex).css("position", "fixed").hide();
                d.find("a").css("-webkit-tap-highlight-color", "rgba(0,0,0,0)").click(function (a) {
                        a.preventDefault();
                        a.stopPropagation();
                        var c = jQuery(this).attr("href");
                        b.cache.activePanel.close_5grid();
                        window.setTimeout(function () {
                                window.location.href = c
                            }, b.config.speed + 10)
                    });
                "ios" == b.deviceType && d.find("input,select,textarea").focus(function (a) {
                        var c = jQuery(this);
                        a.preventDefault();
                        a.stopPropagation();
                        window.setTimeout(function () {
                                var a = b.cache.window.scrollPos_5grid,
                                    d = b.cache.window.scrollTop() - a;
                                b.cache.window.scrollTop(a);
                                b.cache.activePanel.scrollTop(b.cache.activePanel.scrollTop() + d);
                                c.hide();
                                window.setTimeout(function () {
                                        c.show()
                                    }, 0)
                            }, 100)
                    });
                switch (c.position) {
                case "left":
                case "right":
                    var f = "right" == c.position ? "-" : "";
                    d.addClass("5grid-ui-panel-" + c.position).css("width", c.size).scrollTop(0);
                    b.isTouch ? d.css("overflow-y", "scroll").css("-webkit-overflow-scrolling", "touch").bind("touchstart", function (a) {
                            d._posY = a.originalEvent.touches[0].pageY;
                            d._posX = a.originalEvent.touches[0].pageX
                        }).bind("touchmove", function (a) {
                            var b = d._posX - a.originalEvent.touches[0].pageX;
                            a = d._posY - a.originalEvent.touches[0].pageY;
                            var f = d.outerHeight(),
                                h = d.get(0).scrollHeight - d.scrollTop();
                            if (c.swipeToClose && 20 > a && -20 < a && ("left" == c.position && 50 < b || "right" == c.position && -50 > b)) return d.close_5grid(), !1;
                            if (0 == d.scrollTop() && 0 > a || h > f - 2 && h < f + 2 && 0 < a) return !1
                        }) : d.css("overflow-y", "auto");
                    switch (c.style) {
                    case "push":
                        d.open_5grid = function () {
                            d.promote_5grid().scrollTop(0).css("top", 0).css(c.position, "-" + c.size).css("height", "100%").show();
                            c.resetScroll && d.scrollTop(0);
                            c.resetForms && d.resetForms_5grid();
                            b.lockView("x");
                            window.setTimeout(function () {
                                    d.css("transform", "translate(" + f + "100%,0)");
                                    b.cache.pageWrapper.css("transform", "translate(" + f + c.size + ",0)");
                                    b.cache.fixedWrapper.children().css("transform", "translate(" + f + c.size + ",0)");
                                    b.cache.activePanel = d
                                }, 100)
                        };
                        d.close_5grid = function () {
                            d.find("*").blur();
                            d.css("transform", "translate(0,0)");
                            b.cache.pageWrapper.css("transform", "translate(0,0)");
                            b.cache.fixedWrapper.children().css("transform", "translate(0,0)");
                            window.setTimeout(function () {
                                    b.unlockView("x");
                                    d.demote_5grid().hide();
                                    b.cache.activePanel = null
                                }, b.config.speed + 50)
                        };
                        break;
                    case "reveal":
                        d.open_5grid = function () {
                            b.cache.fixedWrapper.promote_5grid(2);
                            b.cache.pageWrapper.promote_5grid(1);
                            d.scrollTop(0).css("top", 0).css(c.position, 0).css("height", "100%").show();
                            c.resetScroll && d.scrollTop(0);
                            c.resetForms && d.resetForms_5grid();
                            b.lockView("x");
                            window.setTimeout(function () {
                                    b.cache.pageWrapper.css("transform", "translate(" + f + c.size + ",0)");
                                    b.cache.fixedWrapper.children().css("transform", "translate(" + f + c.size + ",0)");
                                    b.cache.activePanel = d
                                }, 100)
                        }, d.close_5grid = function () {
                            d.find("*").blur();
                            d.css("transform", "translate(0,0)");
                            b.cache.pageWrapper.css("transform", "translate(0,0)");
                            b.cache.fixedWrapper.children().css("transform", "translate(0,0)");
                            window.setTimeout(function () {
                                    b.unlockView("x");
                                    d.hide();
                                    b.cache.pageWrapper.demote_5grid();
                                    b.cache.pageWrapper.demote_5grid();
                                    b.cache.activePanel = null
                                }, b.config.speed + 50)
                        }
                    }
                }
                break;
            case "bar":
                d.css("z-index", this.config.baseZIndex).addClass("5grid-ui-bar");
                switch (c.style) {
                case "floating":
                    d.css("position", "fixed");
                    break;
                case "fixed":
                    d.css("position", "absolute")
                }
                switch (c.position) {
                case "top":
                    d.addClass("5grid-ui-bar-top").css("top", 0).css("left", 0).css("width", "100%").css("height", c.size);
                    break;
                case "bottom":
                    d.addClass("5grid-ui-bar-bottom").css("bottom", 0).css("left", 0).css("width", "100%").css("height", c.size);
                    break;
                case "left":
                    d.addClass("5grid-ui-bar-left").css("top", 0).css("left", 0).css("width", c.size).css("height", "100%");
                    break;
                case "right":
                    d.addClass("5grid-ui-bar-right").css("top", 0).css("right", 0).css("width", c.size).css("height", "100%")
                }
            }
        },
        initComponents: function (a) {
            var b = this,
                c, d, f, e, g;
            for (d in this.config[a + "s"]) for (g in c = {}, b.parent.extend(c, b.defaults.config[a]), b.parent.extend(c, b.config[a + "s"][d]), b.config[a + "s"][d] = c, f = this.parent.newDiv(c.html), f.id = d, f.className = "5grid-ui-" + a, e = c.breakpoints.split(","), e) z = this.parent.cacheBreakpointElement(e[g], d, f, "bar" == a ? "5grid_ui_fixedWrapper" : "5grid_ui_defaultWrapper", 2), z.config = c, z.initialized = !1, z.type = a, z.onAttach = function () {
                        this.initialized ? b.resumeComponent(this) : (b.initComponent(this), this.initialized = !0)
            }, z.onDetach = function () {
                b.suspendComponent(this)
            }
        },
        initHelpers: function () {
            var a = this;
            jQuery.fn.promote_5grid = function (b) {
                this._zIndex = this.css("z-index");
                this.css("z-index", a.config.baseZIndex + (b ? b : 1));
                return this
            };
            jQuery.fn.demote_5grid = function () {
                this._zIndex && (this.css("z-index", this._zIndex), this._zIndex = null);
                return this
            };
            jQuery.fn.accelerate_5grid = function () {
				var a, b = {
						ios: "(iPad|iPhone|iPod)",
						android: "Android"
					};
				for (a in b) if (navigator.userAgent.match(RegExp(b[a], "g"))) {
						this.deviceType = a;
					}
				if(this.deviceType == a){ 
						return jQuery(this).css("backface-visibility", "hidden").css("perspective", "500") 
					}
            };
            jQuery.fn.xcssValue_5grid = function (a, c) {
                return jQuery(this).css(a, "-moz-" + c).css(a, "-webkit-" + c).css(a, "-o-" + c).css(a, "-ms-" + c).css(a, c)
            };
            jQuery.fn.xcssProperty_5grid = function (a, c) {
                return jQuery(this).css("-moz-" + a, c).css("-webkit-" + a, c).css("-o-" + a, c).css("-ms-" + a, c).css(a, c)
            };
            jQuery.fn.xcss_5grid = function (a, c) {
                return jQuery(this).css("-moz-" + a, "-moz-" + c).css("-webkit-" + a, "-webkit-" + c).css("-o-" + a, "-o-" + c).css("-ms-" + a, "-ms-" + c).css(a, c)
            };
            jQuery.fn.applyTransition_5grid = function () {
                return jQuery(this).xcss_5grid("transition", "transform " + a.config.speed / 1E3 + "s ease-in-out")
            };
            jQuery.fn.clearTransition_5grid = function () {
                return jQuery(this).xcss_5grid("transition", "none")
            };
            jQuery.fn.resetForms_5grid = function () {
                var a = jQuery(this);
                jQuery(this).find("form").each(function () {
                        this.reset()
                    });
                return a
            }
        },
        initObjects: function () {
            var a = this;
            a.cache.window = jQuery(window);
            a.cache.window.load(function () {
                    0 == a.cache.window.scrollTop() && window.scrollTo(0, 1)
                });
            this.parent.DOMReady(function () {
                    a.cache.body = jQuery("body");
                    a.cache.body.wrapInner('<div id="5grid-ui-pageWrapper" />');
                    a.cache.pageWrapper = jQuery("#5grid-ui-pageWrapper");
                   	a.cache.pageWrapper.css("position", "relative").css("left", "0").css("right", "0").css("top", "0").css("bottom", "0").applyTransition_5grid().accelerate_5grid();
                    a.cache.defaultWrapper = jQuery('<div id="5grid-ui-defaultWrapper" />').appendTo(a.cache.body);
                    a.cache.defaultWrapper.css("height", "100%");
                    a.cache.fixedWrapper = jQuery('<div id="5grid-ui-fixedWrapper" />').appendTo(a.cache.body);
                    a.cache.fixedWrapper.css("position", "relative");
                    jQuery(".5grid-ui-fixed").appendTo(a.cache.fixedWrapper);
                    a.parent.registerLocation("5grid_ui_defaultWrapper", a.cache.defaultWrapper[0]);
                    a.parent.registerLocation("5grid_ui_fixedWrapper", a.cache.fixedWrapper[0]);
                    a.parent.registerLocation("5grid_ui_pageWrapper", a.cache.pageWrapper[0])
                })
        },
        initDeviceType: function () {
            var a, b = {
                    ios: "(iPad|iPhone|iPod)",
                    android: "Android"
                };
            for (a in b) if (navigator.userAgent.match(RegExp(b[a], "g"))) {
                    this.deviceType = a;
                    break
                }
            this.deviceType || (this.deviceType = "other");
            this.eventType = (this.isTouch = !! ("ontouchstart" in window)) ? "touchend" : "click"
        },
        init: function () {
            this.initDeviceType();
            this.initHelpers();
            this.initObjects();
            this.initComponents("bar");
            this.initComponents("panel");
            this.parent.updateState()
        }
    });