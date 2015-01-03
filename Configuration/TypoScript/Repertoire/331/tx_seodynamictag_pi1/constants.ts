plugin.tx_seodynamictag {
  canonical {
    single {
        // Only this parameter are allowed:
      additionalParams = &tx_browser_pi1[repertoireUid]={GP:tx_browser_pi1|repertoireUid}
    }
  }
  condition {
    single {
        // Please replace xxx with the uid of the page with the repertoire plugin for the single view
        // Please use the Constant Editor
      begin = globalVar = GP:tx_browser_pi1|repertoireUid > 0] && [globalVar = TSFE:id = xxx
    }
  }
  database {
    table = tx_org_repertoire
    var.1 = tx_browser_pi1[repertoireUid]
    field {
      //author        =
      description   = seo_description
      keywords      = seo_keywords
      title         = title
      short         = bodytext
    }
  }
  default {
    description = Description is empty! Please maintain the current record of the TYPO3 Organiser Repertoire. See tab [Search Engine] field [Description]
  }
  keywords {
    default         = Keywords are empty! Please maintain the current record of the TYPO3 Organiser Repertoire. See tab [Search Engine] field [Keywords]
    moveToKeywords  = 0
  }
}