plugin.tx_browser_pi1 {
  views {
    list {
      201 {
        navigation {
          map {
            marker {
              variables {
                system {
                  description {
                      // image
                    20 {
                        // link to tx_org_repertoire
                      tx_org_repertoire < .default
                      XXXtx_org_repertoire {
                        imageLinkWrap {
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
                      // header
                    30 {
                        // link to tx_org_repertoire
                      tx_org_repertoire < .default
                      XXXtx_org_repertoire {
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
                      // text
                    40 {
                        // link to tx_org_repertoire
                      tx_org_repertoire < .default
                      XXXtx_org_repertoire {
                          // details link
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
                  url {
                      // link to tx_org_repertoire
                    tx_org_repertoire < .default
                    XXXtx_org_repertoire {
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
            }
          }
        }
      }
    }
  }
}