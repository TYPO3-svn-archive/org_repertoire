plugin.tx_browser_pi1 {
  views {
    single {
      201 = +Org-Repertoire: Calendar
      201 {
        name    = +Org-Repertoire: Calendar
        select := addToList(tx_org_repertoire.title,tx_org_repertoire.subtitle,tx_org_repertoire.producer,tx_org_repertoire.teaser_subtitle,tx_org_repertoire.teaser_short,tx_org_repertoire.teaser_title,tx_org_repertoire.bodytext)
      }
    }
  }
}