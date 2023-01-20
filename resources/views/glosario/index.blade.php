@extends('layout.app')
@section('content')
    <main class="bg-body-bg">
        <section class="u-container">
            <h2 class="text-center text-xl xl:text-4xl font-bold mb-14">
                Como calificamos/explicación de indices
            </h2>
            <h3 class="xl:text-lg font-bold my-8">Dentro del ranking de entidades, proveemos la siguiente información:</h3>
            <ul class="list-disc pl-10 grid gap-6 xl:gap-10">
                <li>
                    <p class="text-sm xl:text-base">- Proveedor con más de 3 contrataciones: Se trata de proveedores con mas
                        de 3 ordenes de compra o contratos con una misma entidad en un mismo año. Este patrón puede servir
                        para determinar que entidades han contratado recurrentemente con un proveedor.</p>
                </li>

                <li>
                    <p class="text-sm xl:text-base">- Proveedor recién creado: Se trata de proveedores cuya fecha de
                        inscripción en el registro nacional de proveedores tiene menos de 30 días desde que una entidad le
                        emitió una orden de compra o contrato. Este patrón podría servir para determinar la creación de
                        proveedores específicos para una compra.</p>
                </li>
                <li>
                    <p class="text-sm xl:text-base">- Consorcio con proveedor recién creado: Es una variación del anterior
                        patrón, se trata de que algún proveedor miembro del consorcio tiene menos de 30 días desde su
                        inscripción en el registro nacional de proveedores. Este patrón podría servir para determinar la
                        creación de proveedores específicos para una compra.</p>
                </li>
                <li>
                    <p class="text-sm xl:text-base">Proveedor con mismo representante: Se trata de proveedores que durante el
                        proceso de selección comparte el mismo representante/accionista/gerente con otros postores. Este
                        patrón podría servir para determinar la simulación del proceso de selección.</p>
                </li>
                <li>
                    <p class="text-sm xl:text-base">Adjudicaciones directas: Se trata de proveedores, los cuales fueron
                        favorecidos directamente por la entidad, sin la realización de un proceso de selección. Este patrón
                        podría servir para determinar el direccionamiento de una compra.</p>
                </li>
            </ul>
            <h3 class="xl:text-lg font-bold my-8">Dentro del ranking de proveedores proveemos la siguiente información:</h3>
            <ul class="list-disc pl-10 grid gap-6 xl:gap-10">
                <li>
                    <p class="text-sm xl:text-base">
                        Orden de compra. Todas las ordenes de compra registras a favor del proveedor de un año específico.
                    </p>
                </li>
                <li>
                    <p class="text-sm xl:text-base">
                        Contratos: Todos los contratos suscritos a favor del proveedor de un año específico.
                    </p>
                </li>
                <li>
                    <p class="text-sm xl:text-base">
                        Como consorcio: Todos los contratos suscritos a favor de un consorcio en el cual el proveedor es
                        miembro.
                    </p>
                </li>
                <li>
                    <p class="text-sm xl:text-base">
                        Contratos resueltos: Todos los contratos resueltos al proveedor.
                    </p>
                </li>
                <li>
                    <p class="text-sm xl:text-base">
                        Postulaciones: Todas las postulaciones en procesos de selección del proveedor.
                    </p>
                </li>
                <li>
                    <p class="text-sm xl:text-base">
                        Postulaciones con mismo representante: Todas las postulaciones en procesos de selección del
                        proveedor, en las cuales los postores del mismo proceso tienen registrado el mismo
                        accionista/representante legal/gerente del proveedor.
                    </p>
                </li>
                <li>
                    <p class="text-sm xl:text-base">
                        Sanciones: Todas las sanciones administrativas (suspensiones) y multas al proveedor
                    </p>
                </li>
            </ul>
            <h3 class="xl:text-lg font-bold my-8">Dentro del ranking de funcionarios, proveemos la siguiente información:
            </h3>
            <ul class="list-disc pl-10 grid gap-6 xl:gap-10">
                <li>
                    <p class="text-sm xl:text-base">
                        Donde se contrata directamente a un pariente: Se muestran órdenes de compra, contratos emitidos a
                        favor de los parientes registrados en las declaraciones juradas de intereses del funcionario.
                    </p>
                </li>
                <li>
                    <p class="text-sm xl:text-base">
                        Donde un pariente es representante de una empresa: Se muestran ordenes de compra, contratos emitidos
                        a favor de empresas en donde los parientes registrados en las declaraciones juradas de intereses del
                        funcionario son accionistas/representantes legales/gerentes.
                    </p>
                </li>
                <li>
                    <p class="text-sm xl:text-base">
                        Contrataciones directas a los funcionarios: Donde se emiten ordenes de compra o contratos a favor
                        del funcionario, desempeñando ya un cargo en el estado.
                    </p>
                </li>
                <li>
                    <p class="text-sm xl:text-base">
                        Contrataciones a empresas donde el funcionario es accionista: Se muestra órdenes de compra,
                        contratos emitidos a favor de empresas en las cuales el funcionario declara tener acciones y están
                        son mas del 30%.
                    </p>
                </li>
            </ul>
        </section>
    </main>
@endsection
