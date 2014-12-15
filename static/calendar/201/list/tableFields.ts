plugin.tx_browser_pi1 {
  views {
    list {
      201 {
        tx_org_cal {
          title {
            10 {
              20 {
                  // link to tx_org_repertoire
                tx_org_repertoire < .default
                tx_org_repertoire {
                  typolink {
                    parameter {
                      cObject {
                        10 {
                          10 {
                            if {
                              isTrue = {$plugin.org.pages.repertoire}
                            }
                            value = {$plugin.org.pages.repertoire}
                          }
                          20 {
                            if {
                              isFalse = {$plugin.org.pages.repertoire}
                            }
                            value = {$plugin.org.pages.repertoire}
                          }
                        }
                      }
                    }
                    additionalParams {
                      field = tx_org_repertoire.uid
                      wrap  = &tx_browser_pi1[repertoireUid]=|
                    }
                  }
                }
              }
              40 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0
              40 {
                  // link to tx_org_repertoire
                tx_org_repertoire < .default
                tx_org_repertoire {
                  20 {
                    typolink {
                      parameter {
                        cObject {
                          10 {
                            10 {
                              if {
                                isTrue = {$plugin.org.pages.repertoire}
                              }
                              value = {$plugin.org.pages.repertoire}
                            }
                            20 {
                              if {
                                isFalse = {$plugin.org.pages.repertoire}
                              }
                              value = {$plugin.org.pages.repertoire}
                            }
                          }
                        }
                      }
                      additionalParams {
                        field = tx_org_repertoire.uid
                        wrap  = &tx_browser_pi1[repertoireUid]=|
                      }
                    }
                  }
                }
              }
            }
              // margin: datesheet
            20 {
              10 {
                  // 10: date isn't expired
                10 {
                    // name of weekday
                  10 {
                    tx_org_repertoire < .default
                    tx_org_repertoire {
                      typolink {
                        parameter {
                          cObject {
                            10 {
                              10 {
                                if {
                                  isTrue = {$plugin.org.pages.repertoire}
                                }
                                value = {$plugin.org.pages.repertoire}
                              }
                              20 {
                                if {
                                  isFalse = {$plugin.org.pages.repertoire}
                                }
                                value = {$plugin.org.pages.repertoire}
                              }
                            }
                          }
                        }
                        additionalParams {
                          field = tx_org_repertoire.uid
                          wrap  = &tx_browser_pi1[repertoireUid]=|
                        }
                      }
                    }
                  }
                    // day of month as number
                  20 < .10
                  20 {
                    tx_org_repertoire {
                      strftime  = %d
                      wrap      = <li class="day_of_month">|</li>
                    }
                  }
                    // month year
                  30 < .10
                  30 {
                    tx_org_repertoire {
                      strftime  = %b %y
                      wrap      = <li class="month">|</li>
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
            wrap = <div class="row">|</div>
          }
        }
      }
    }
  }
}