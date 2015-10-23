plugin.tx_browser_pi1 {
  views {
    single {
      331 {
        tx_org_repertoire {
          title {
            40 {
            }
              // tx_org_repertoire.tx_org_cal
            40 = COA
            40 {
              if {
                isTrue {
                  field = tx_org_repertoire.tx_org_cal
                }
              }
              wrap = <div class="columns"><ul class="vcard tx_org_repertoire tx_org_cal">|</ul><!-- vcard --></div><!-- /columns -->
                // header
              10 = TEXT
              10 {
                value = Events
                lang {
                  de = Veranstaltungen
                  en = Events
                }
                wrap = <li class="header">|</li>
              }
                // tx_org_repertoire.uid
              XXX19 = TEXT
              XXX19 {
                field = tx_org_repertoire.uid
                wrap = <li class="tx_org_cal">|</li>
              }
              20 = COA
              20 {
                20 = CONTENT
                20 {
                  table = tx_org_cal
                  select {
                    pidInList = {$plugin.org.sysfolder.calendar}
                    join = tx_org_mm_all ON tx_org_mm_all.uid_local = tx_org_cal.uid
                    where {
                      field = tx_org_repertoire.uid
                      noTrimWrap = |tx_org_mm_all.uid_foreign = | AND tx_org_mm_all.table_local = 'tx_org_cal' AND tx_org_mm_all.table_foreign = 'tx_org_repertoire'|
                    }
                    andWhere = tx_org_cal.datetime > UNIX_TIMESTAMP()
                    orderBy = tx_org_cal.datetime ASC
                    //max = 3
                  }
                    // tx_org_cal.title croped and linked
                  renderObj = CASE
                  renderObj {
                    key {
                      field = {$plugin.tx_browser_pi1.templates.listview.url.5.key}
                    }
                      // link to detail view
                    default = COA
                    default {
                        // datetime
                      20 = TEXT
                      20 {
                        field = datetime
                        strftime {
                          stdWrap {
                            cObject = TEXT
                            cObject {
                              value = %a., %d. %b. %Y %H:%M h
                              lang {
                                de = %a., %d. %b. %Y %H:%M Uhr
                                en = %a., %d. %b. %Y %H:%M h
                              }
                            }
                          }
                        }
                      }
                      30 = TEXT
                      30 {
                        value = city
                        noTrimWrap = |, ||
                      }
                      40 = TEXT
                      40 {
                        value = location name
                        noTrimWrap = |, ||
                      }
                      50 = TEXT
                      50 {
                        value = &raquo;
                        noTrimWrap = | ||
                      }
                      wrap = <li class="url">|</li>
                      stdWrap {
                        typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.5.default
                      }
                    }
                      // no link
                    notype = COA
                    notype {
                        // datetime
                      20 = TEXT
                      20 {
                        field   = title
                      }
                    }
                      // link to internal page
                    page < .default
                    page {
                      stdWrap {
                        typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.5.page
                      }
                    }
                      // link to external url
                    url < .page
                    url {
                      stdWrap {
                        typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.5.url
                      }
                    }
                  }
                }
                10 < .20
                10 {
                  select {
                    andWhere = tx_org_cal.datetime <= UNIX_TIMESTAMP()
                    max = 1
                  }
                  renderObj {
                    default {
                      wrap = <li class="url expired">|</li>
                    }
                    notype {
                      wrap = <li class="url expired">|</li>
                    }
                      // link to internal page
                    page {
                      wrap = <li class="url expired">|</li>
                    }
                    url {
                      wrap = <li class="url expired">|</li>
                    }
                  }
                }
                wrap = <li class="tx_org_cal">|</li>
              }
            }
          }
        }
      }
    }
  }
}