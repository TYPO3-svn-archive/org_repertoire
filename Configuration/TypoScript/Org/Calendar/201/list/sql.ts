plugin.tx_browser_pi1 {
  views {
    list {
      201 = +Org-Repertoire: Calendar
      201 {
        name    = +Org-Repertoire: Calendar
        // ,tx_org_repertoire.page,tx_org_repertoire.type,tx_org_repertoire.url
        select := addToList(tx_org_repertoire.title,tx_org_repertoire.bodytext,tx_org_repertoire.image,tx_org_repertoire.imageseo,tx_org_repertoire.subtitle,tx_org_repertoire.producer,tx_org_repertoire.teaser_subtitle,tx_org_repertoire.teaser_short,tx_org_repertoire.teaser_title)
      }
    }
  }
}