import { computed } from "vue"

export const useFilters = () => {
  const dateformat = (date : string) => {
    const dateTime = date as string
    return dateTime.slice(0, 10)
  }

  return {
    dateformat
  }
}