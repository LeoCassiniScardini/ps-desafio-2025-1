'use client'

import {
  SelectTrigger,
  SelectValue,
  SelectContent,
  SelectItem,
  SelectGroup,
  Select,
} from '@/components/select'
import { Button } from '@/components/button'
import {
  FormFieldsGroup,
  FormField,
  ImageForm,
  handleImageChange,
} from '@/components/dashboard/form'
import { api } from '@/services/api'
import { DialogFooter } from '@/components/dialog'
import { Input } from '@/components/input'
import { Label } from '@/components/label'
import { cn } from '@/lib/utils'
import { ResponseErrorType } from '@/services/api'
import { categoryType } from '@/types/category'
import { vehicleType } from '@/types/vehicle'
import { useEffect, useState } from 'react'
import { useFormStatus } from 'react-dom'

interface FormFieldsVehicleProps {
  vehicle?: vehicleType | null
  readOnly?: boolean
  error?: ResponseErrorType | null
}

export default function FormFieldsVehicle({
  vehicle,
  readOnly,
  error,
}: FormFieldsVehicleProps) {
  const { pending } = useFormStatus()
  const [categories, setCategories] = useState<categoryType[]>()
  const [updateImage, setUpdateImage] = useState<string | undefined>()

  const requestData = async () => {
    try {
      const response = await api('GET', '/categorias')
      if (response.error){
        console.log('Não foi possível carregar as categorias')
      } else {
        setCategories(response.response as categoryType[])
      }
    } catch (error) {
      console.log('Erro ao carregar categorias')
    }
  }

  useEffect(() => {
    requestData()
  }, [])

  
  return (
    <>
      <FormFieldsGroup>
        {vehicle && <Input defaultValue={vehicle.id} type="text" name="id" hidden />}
        <FormField>
          <Label htmlFor="nome" required={!vehicle}>
            Nome
          </Label>
          <Input
            name="nome"
            id="nome"
            placeholder="Insira o nome do veículo"
            defaultValue={vehicle?.nome}
            disabled={pending}
            readOnly={readOnly}
            error={error?.errors?.nome}
          />
        </FormField>
        <FormField>
          <Label htmlFor="marca" required={!vehicle}>
            Marca
          </Label>
          <Input
            name="marca"
            id="marca"
            placeholder="Insira a marca do veículo"
            defaultValue={vehicle?.marca}
            disabled={pending}
            readOnly={readOnly}
            error={error?.errors?.marca}
          />
        </FormField>
        <FormField>
          <Label htmlFor="ano" required={!vehicle}>
            Ano
          </Label>
          <Input
            name="ano"
            id="ano"
            type="number"
            placeholder="Insira o ano de fabricação"
            defaultValue={vehicle?.ano}
            disabled={pending}
            readOnly={readOnly}
            error={error?.errors?.ano}
          />
        </FormField>
        <FormField>
          <Label htmlFor="quantidade" required={!vehicle}>
            Quantidade
          </Label>
          <Input
            name="quantidade"
            id="quantidade"
            type="number"
            placeholder="Insira a quantidade disponível"
            defaultValue={vehicle?.quantidade}
            disabled={pending}
            readOnly={readOnly}
            error={error?.errors?.quantidade}
          />
        </FormField>
        <FormField>
          <Select
            disabled={pending || readOnly}
            name="categoria_id"
            defaultValue={vehicle?.categoria.id}
          >
            <Label>Categoria</Label>
            <SelectTrigger>
              <SelectValue placeholder="Selecione uma categoria" />
            </SelectTrigger>
            <SelectContent id="categoria_id">
              <SelectGroup id="categoria_id">
                {categories?.map((category: categoryType, index: number) => (
                  <SelectItem value={category.id} key={index}>
                    {category.nome}
                  </SelectItem>
                ))}
              </SelectGroup>
            </SelectContent>
          </Select>
        </FormField>
          {error?.errors?.categoria_id && (
            <p className='text-destructive text-xs mt-2'>
              {error?.errors?.categoria_id}
            </p>
          )}
        <FormField>
          <Label htmlFor="imagem" hidden={readOnly && !vehicle?.imagem}>
            Imagem
          </Label>
          <Input
            name="imagem"
            id="imagem"
            type="file"
            accept="image/*"
            disabled={pending}
            hidden={readOnly}
            onChange={(e) => handleImageChange(e, setUpdateImage)}
            error={error?.errors?.imagem}
          />
          <ImageForm
            className="aspect-square size-40"
            src={updateImage || vehicle?.imagem}
          />
        </FormField>
      </FormFieldsGroup>
      <DialogFooter className={cn({ hidden: readOnly })}>
        <Button type="submit" pending={pending}>
          Salvar
        </Button>
      </DialogFooter>
    </>
  )
}
