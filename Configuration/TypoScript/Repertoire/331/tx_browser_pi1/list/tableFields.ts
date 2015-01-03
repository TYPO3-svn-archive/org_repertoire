plugin.tx_browser_pi1 {
  views {
    list {
      331 {
          // title
        tx_org_repertoire =
        tx_org_repertoire {
            // bookmarks, title, subtitle, tx_org_repertoiretype.title, image, teaser_short, location, datesheet
          title = COA
          title {
              // bookmarks, title, subtitle, tx_org_repertoiretype.title, image, teaser_short, location
            10 = COA
            10 {
                // socialmedia_bookmarks
              10 = TEXT
              10 {
                value = ###SOCIALMEDIA_BOOKMARKS###
                wrap = <div style="float:right;">|</div>
              }
                // title: default, notype, page, url, tx_org_event
              20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0
              20 {
                //tx_org_event < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.6
              }
                // subtitle
              21 = TEXT
              21 {
                field = tx_org_repertoire.teaser_subtitle // tx_org_repertoire.subtitle
                wrap = <h3>|</h3>
                required = 1
              }
                // tx_org_repertoiretype.title
              30 = COA
              30 {
                if {
                  isTrue {
                    field = tx_org_repertoiretype.title
                  }
                }
                wrap = <p class="tx_org_repertoiretype">|</p>
                  // label
                10 = TEXT
                10 {
                  data = LLL:EXT:org/locallang_db.xml:filter_phrase.caltype.title
                  noTrimWrap = ||: |
                }
                20 = TEXT
                20 {
                  field = tx_org_repertoiretype.title
                }
              }
                // image
              39 = COA
              39 {
                  // image
                10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0
                10 {
                  //tx_org_event < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.6
                }
                wrap = <div style="float:left;padding-right:1em;">|</div>
              }
                // teaser_short: default, notype, page, url, tx_org_event
              40 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0
              40 {
                //tx_org_event < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.6
              }
              wrap = <div class="columns small-12 medium-12 large-10">|</div>
            }
              // margin: datesheet
            20 = COA
            20 {
              wrap = <div class="columns small-12 medium-12 large-2">|</div>
              10 = COA
              10 {
                if {
                  isTrue {
                    field = tx_org_cal.datetime
                  }
                }
                  // 10: date isn't expired
                10 = COA
                10 {
                  if {
                    value {
                      data = date : U
                    }
                    isGreaterThan {
                      field = tx_org_cal.datetime
                    }
                  }
                  wrap = <ul class="vcard datesheet">|</ul><!-- vcard -->
                    // name of weekday
                  10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.details.0
                  10 {
                    default {
                      value >
                      lang >
                      field = tx_org_cal.datetime
                      strftime  = %a
                      wrap = <li class="weekday">|</li>
                    }
                    notype {
                      value >
                      lang >
                      field = tx_org_cal.datetime
                      strftime  = %a
                      wrap = <li class="weekday">|</li>
                    }
                    page {
                      value >
                      lang >
                      field = tx_org_cal.datetime
                      strftime  = %a
                      wrap = <li class="weekday">|</li>
                    }
                    tx_org_event < plugin.tx_browser_pi1.displayList.master_templates.tableFields.details.6
                    tx_org_event {
                      default {
                        value >
                        lang >
                        field = tx_org_cal.datetime
                        strftime  = %a
                        wrap = <li class="weekday">|</li>
                      }
                      notype {
                        value >
                        lang >
                        field = tx_org_cal.datetime
                        strftime  = %a
                        wrap = <li class="weekday">|</li>
                      }
                      page {
                        value >
                        lang >
                        field = tx_org_cal.datetime
                        strftime  = %a
                        wrap = <li class="weekday">|</li>
                      }
                      url {
                        value >
                        lang >
                        field = tx_org_cal.datetime
                        strftime  = %a
                        wrap = <li class="weekday">|</li>
                      }
                    }
                    url {
                      value >
                      lang >
                      field = tx_org_cal.datetime
                      strftime  = %a
                      wrap = <li class="weekday">|</li>
                    }
                  }
                    // day of month as number
                  20 < .10
                  20 {
                    default {
                      strftime  = %d
                      wrap      = <li class="day_of_month">|</li>
                    }
                    notype {
                      strftime  = %d
                      wrap      = <li class="day_of_month">|</li>
                    }
                    page {
                      strftime  = %d
                      wrap      = <li class="day_of_month">|</li>
                    }
                    tx_org_event {
                      default {
                        strftime  = %d
                        wrap      = <li class="day_of_month">|</li>
                      }
                      notype {
                        strftime  = %d
                        wrap      = <li class="day_of_month">|</li>
                      }
                      page {
                        strftime  = %d
                        wrap      = <li class="day_of_month">|</li>
                      }
                      url {
                        strftime  = %d
                        wrap      = <li class="day_of_month">|</li>
                      }
                    }
                    url {
                      strftime  = %d
                      wrap      = <li class="day_of_month">|</li>
                    }
                  }
                    // month year
                  30 < .10
                  30 {
                    default {
                      strftime  = %b %y
                      wrap      = <li class="month">|</li>
                    }
                    notype {
                      strftime  = %b %y
                      wrap      = <li class="month">|</li>
                    }
                    page {
                      strftime  = %b %y
                      wrap      = <li class="month">|</li>
                    }
                    tx_org_event {
                      default {
                        strftime  = %b %y
                        wrap      = <li class="month">|</li>
                      }
                      notype {
                        strftime  = %b %y
                        wrap      = <li class="month">|</li>
                      }
                      page {
                        strftime  = %b %y
                        wrap      = <li class="month">|</li>
                      }
                      url {
                        strftime  = %b %y
                        wrap      = <li class="month">|</li>
                      }
                    }
                    url {
                      strftime  = %b %y
                      wrap      = <li class="month">|</li>
                    }
                  }
                }
                  // 20: date is expired
                20 < .10
                20 {
                  if {
                    negate = 1
                  }
                  wrap = <ul class="vcard datesheet datesheet_expired">|</ul><!-- vcard -->
                }
              }
            }
          }
        }
      }
    }
  }
}

XXXplugin.tx_browser_pi1 {
  views {
    list {
      331 {
        tx_org_cal {
          datetime = COA
          datetime {
            10 = TEXT
            10 {
              field = tx_org_cal.datetime
              strftime = %A, %d. %B, %H:%M
            }
            20 = TEXT
            20 {
              value = h
              lang {
                de = Uhr
                en = h
              }
              noTrimWrap = | ||
            }
          }
        }
        tx_org_repertoire {
          image < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0
            // teaser_short || bodytext, more
          teaser_short = COA
          teaser_short {
            required    = 1
            wrap        = <div class="repertoire_teasershort">|</div>
            20 = TEXT
            20 {
              required    = 1
              field       = tx_org_repertoire.teaser_short // tx_org_repertoire.bodytext
              stripHtml   = 1
              crop        = 200 | &nbsp;... | 1
            }
            30 = TEXT
            30 {
              value   = more &raquo;
              lang {
                de = mehr &raquo;
                en = more &raquo;
              }
              typolink {
                parameter {
                  cObject = COA
                  cObject {
                      // url
                    10 = TEXT
                    10 {
                      value = {$plugin.org.pages.repertoire}
                    }
                      // target
                    20 = TEXT
                    20 {
                      value       = -
                      noTrimWrap  = | ||
                    }
                      // class
                    30 = TEXT
                    30 {
                      value       = internal-link
                      noTrimWrap  = | "|"|
                    }
                      // title
                    40 = TEXT
                    40 {
                      value = Repertoire
                      lang {
                        de = Repertoire
                        en = Repertoire
                      }
                      noTrimWrap  = | "|"|
                    }
                  }
                }
                additionalParams {
                  field = tx_org_repertoire.uid
                  wrap  = &tx_browser_pi1[{$plugin.tx_browser_pi1.navigation.showUid}]=|
                }
                useCacheHash = 1
              }
              noTrimWrap = | ||
            }
          }
          subtitle = TEXT
          subtitle {
            required  = 1
            field     = tx_org_repertoire.subtitle
            wrap      = <h3 class="repertoire_subtitle">|</h3>
          }
            // title, producer
          title = COA
          title {
            wrap = <h2 class="repertoire_title">|</h2>
            10 = TEXT
            10 {
              required  = 1
              field     = tx_org_repertoire.title
              typolink {
                parameter {
                  cObject = COA
                  cObject {
                      // url
                    10 = TEXT
                    10 {
                      value = {$plugin.org.pages.repertoire}
                    }
                      // target
                    20 = TEXT
                    20 {
                      value       = -
                      noTrimWrap  = | ||
                    }
                      // class
                    30 = TEXT
                    30 {
                      value       = internal-link
                      noTrimWrap  = | "|"|
                    }
                      // title
                    40 = TEXT
                    40 {
                      value = Repertoire
                      lang {
                        de = Repertoire
                        en = Repertoire
                      }
                      noTrimWrap  = | "|"|
                    }
                  }
                }
                additionalParams {
                  field = tx_org_repertoire.uid
                  wrap  = &tx_browser_pi1[{$plugin.tx_browser_pi1.navigation.showUid}]=|
                }
                useCacheHash = 1
              }
            }
            20 = COA
            20 {
              if {
                isTrue {
                  field = tx_org_repertoire.producer
                }
              }
              10 = TEXT
              10 {
                value = by
                lang {
                  de  = von
                  en  = by
                }
                noTrimWrap = || |
              }
              20 = TEXT
              20 {
                field = tx_org_repertoire.producer
              }
              stdWrap {
                noTrimWrap = | <span class="repertoire_producer">|</span>|
              }
            }
          }
        }
      }
    }
  }
}