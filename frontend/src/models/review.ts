export interface ReviewData {
  userId: string | null
  userName: string | null
  storeId: number | null
  title: string | null
  comment: string | null
  rate: number | null
  reviewDt: string | null
  thumbnail_url: string | null
}

export class Review {
  userId = ''
  userName = ''
  storeId = null
  title = ''
  comment = ''
  rate = 3
  reviewDt = ''
  thumbnail_url = ''

  constructor(initData?: Partial<Review>) {
    if(initData) {
      Object.assign(this, initData)
    }
  }
}