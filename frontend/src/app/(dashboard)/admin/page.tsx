import {
  DashboardHeader,
  DashboardHeaderDescription,
  DashboardHeaderTitle,
  DashboardMain,
} from '@/components/dashboard/dashboard-items'
import SitePage from '@/components/site/page/page'

import { LuHome } from 'react-icons/lu'

export default function Page() {
  return (
    <>
      <DashboardHeader>
        <DashboardHeaderTitle>
          <LuHome />
          Home
        </DashboardHeaderTitle>
        <DashboardHeaderDescription>
          Tela principal da aplicação.
        </DashboardHeaderDescription>
      </DashboardHeader>
      <SitePage/>
    </>
  )
}
